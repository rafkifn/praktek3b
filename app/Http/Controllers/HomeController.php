<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\M_Buku;
use App\Models\M_Peminjam;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['is_admin'], [1]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

public function datauser()
    {
        $user = User::select('*')
        ->where('is_admin', 0)->get();

        return view('v_datauser',compact('user'));
    }

    public function index()
    {
        // $user = User::all();
             $users = User::count();
             $peminjamm = M_Peminjam::count();
             $bukuu = M_Buku::count();
              // $pengembalian = DB::table('peminjaman')->where('keadaan', '=', 'Dikembalikan')->count();
             $pengembalian = DB::table('peminjaman')->where('keadaan','=',1)->count();
                
    return view('dashboard',compact('users','peminjamm','bukuu','pengembalian'));
    }
    public function info()
    {
        return view('info');
    }

    //    public function h2()
    // {
    //     return view('v_home2');
    // }

     

      public function databuku()
    {
        return view('v_databuku');
    }

     

      public function modal()
    {
    
     //    if ($request->has('search')) {
     //     $bukuu=M_Buku::where('sinopsis','Like', '%'.$request->search.'%');
     // }else{
     //    $bukuu = M_Buku::all();
     //    }

// if($request){
//     $bukuu=M_Buku::where('sinopsis','like','%'.$request.'%')->get();

// }else{
//     $bukuu=M_Buku::all();
// }

        return view('modal');
    }

   
}
