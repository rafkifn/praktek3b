<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:10',
            'cpassword' => 'required|min:5|max:10|same:password'

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        $last_id =$user->id;
        $token = $last_id.hash('sha256', \Str::random(120));
        $verifyURL = route('user.verify', ['token'=>$token,'service'=>'Email_verification']);

        VerifyUser::create([
            'user_id'=>$last_id,
            'token'=>$token,
        ]);

        $message = 'Halo <b>'.$request->name.'</b>';
        $message.= 'Terimakasih telah melakukan pendaftaran Sistem Pomodoro, Anda perlu memverifikasi akun email Anda untuk melengkapi pendaftaran.';

        $mail_data = [
            'recipient'=>$request->email,
            'fromEmail'=>$request->email,
            'fromName'=>'Pomodoro Polsub',
            'subject'=>'Verifikasi Akun Pomodoro Polsub',
            'body'=>$message,
            'actionLink'=>$verifyURL,
        ];

        \Mail::send('email-template', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });


        if ($save){
            return redirect ('user/register')-> with('success', 'Registrasi Anda berhasil! Silahkan verifikasi email Anda!');
        }else{
            return back()->with('failed', 'Terjadi Kesalahan!');
        }
    }

    public function verify(Request $request){
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(!is_null($verifyUser)){
            $user = $verifyUser->user;

            if(!$user->email_verified){
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect()->route('user.login')->with('info', 'Email berhasil diverifikasi, Silahkan login!')->with('verifiedEmail', $user->email);
            }else{
                return redirect()->route('user.login')->with('info', 'Email Anda sudah diverifikasi, Silahkan login!')->with('verifiedEmail', $user->email);
            }
        }
    }

    public function check(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:10'
        ],[
            'email.exists'=>'Email belum terdaftar, Silahkan lakukan registrasi!'
        ]);

        $creds = $request->only('email', 'password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('failed','Password salah');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function showForgotForm(){
        return view('dashboard.user.forgot');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('user.reset.password.form', ['token'=>$token, 'email'=>$request->email]);
        $body = "Kami telah menerima permintaan untuk mereset password untuk akun <b>Pomodoro Polsub</b> dengan email ".$request->email." Anda dapat mereset password Anda dengan menekan tombol dibawah ini";

        \Mail::send('email-forgot', ['action_link'=>$action_link, 'body'=>$body], function($message) use ($request){
            $message->from('pomodoroposlub@gmail.com', 'Pomodoro Polsub');
            $message->to($request->email, $request->name)
                    ->subject('Reset Password');
        });

        return back()->with('success', 'Kami telah mengirimkan email untuk reset password');
    }

    public function showResetForm(Request $request, $token = null){
        return view('dashboard.user.reset')->with(['token'=>$token, 'email'=>$request->email]);
    }
    public function resetPassword(Request $request){
        $request->validate([
            'email' =>'required|email|exists:users,email',
            'password' => 'required|min:5|max:10',
            'cpassword' => 'required|min:5|max:10|same:password'
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
        if(!$check_token){
            return back()->withInput()->with('failed', 'Token tidak valid');
        }else{
            User::where('email', $request->email)->update([
                'password'=> \Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('user.login')->with('info', 'Password anda telah diubah! Silahkan login dengan password baru')->with('verifiedEmail', $request->email);
        }
    }



}
