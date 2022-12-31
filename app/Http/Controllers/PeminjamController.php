<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Peminjam;
use App\Models\User;
use DB;
use Carbon\Carbon;
use App\Models\M_Buku;


class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamm=M_Peminjam::all();
        
        return view('peminjam.index',compact('peminjamm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           // DB::table('buku')->where('id',$id)->update([
           //      'stok'=>$bukuu['stok'] -1
           //  ]);
        
         $peminjamm=M_Peminjam::all();
        //  $peminjamm = $total - ($tanggal_peminjam+500);
        //   $peminjamm  = [
        //     'totalrp' => M_Peminjam($total),
        // ];
         $peminjam = new M_Peminjam();

         $data = [
            'buku' => $peminjam->databuku(),
         ];
        return view('peminjam.create', $data)
         ->with('success',' created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'username' => 'required',
            'id_buku' => 'required',
        //ini adalah konversi keterangan validasi dalam bahasa indonesia
            'judul_buku' => 'required',
            'tanggal_peminjam' => 'required|date|after_or_equal:today',
            
            'tanggal_pengembalian' => 'required|date|after_or_equal:date',
            //     'tanggal_peminjam'=>$this->tanggal_peminjam
            // 'tanggal_pengembalian'=>Carbon::create($this->tanggal_peminjam)->addDays(10)
        ]);
        
      //    $file=$request->file('image');
      //    $file=$request->image;

       M_Peminjam::create($request->all());       
        return redirect()->route('books')
                        ->with('success',' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(M_Peminjam $peminjamm)
    {
        return view('peminjam.show',compact('peminjamm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(M_Peminjam $peminjamm)
    {
        return view('peminjam.edit', compact('peminjamm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_Peminjam $peminjamm)
    {
         $request->validate([
            'username' => 'required',
            'status' => 'required',
            
        ]);
      
        $peminjamm->update($request->all());
      
        return redirect()->route('peminjam.index')
                        ->with('success',' updated successfully');
        // $validatedData->validate([
        //     'username' => 'required',
        //     'judul_buku' => 'required',
        //     'tanggal_peminjam' => 'required|date|after_or_equal:today',

        //     'tanggal_pengembalian' => 'required|date|after_or_equal:date',
        //         'tanggal_peminjam'=>$this->tanggal_peminjam
        //     'tanggal_pengembalian'=>Carbon::create($this->tanggal_peminjam)->addDays(10)
        // ]);

        // DB::table('buku')->where('id',$id)->update([
        //         'stok'=>$bukuu['stok'] -1
        //  $bukuu = M_Buku::where('id', $id)==$peminjamm(id);
        // foreach($peminjamm->$bukuu as $buku){
        //     $buku::where('id',$bukuu)->update([
        //         'stok'=>$bukuu['stok'] -1,
        //     ]);
        // }
        //      M_Peminjam::where('id', $bukuu->id)
        // ->update($validatedData);
        
      
        // return redirect()->route('books')
        //                 ->with('success',' updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Peminjam $peminjamm, $id)
    {
        $peminjamm=M_Peminjam::find($id);
          $peminjamm->delete();
        return redirect()->route('peminjam.index')
        ->with('success','delete berhasil');
    }

       public function peminjaman()
    {
           $peminjamm=M_Peminjam::all();
        return view('v_peminjaman', compact('peminjamm'));
    }

    public function transaksi()
    {
        // return $carbon->translatedFormat($format);
              $peminjamm=M_Peminjam::all();
        return view('v_transaksi', compact('peminjamm'));
    }

       public function pengembalian()
    {
         $peminjamm=M_Peminjam::all();
        return view('v_pengembalian', compact('peminjamm'));
    }


    public function laporan()
    {
           $peminjamm = M_Peminjam::count();
             $bukuu = M_Buku::count();
    // return view('dashboard',compact('users','peminjamm','bukuu'));
         // $peminjamm=M_Peminjam::all();
        return view('laporan', compact('peminjamm','bukuu'));
    }

       public function ubah_status($id)
    {
        
         // $data = DB::table('peminjaman')->where('id', '=', $id)->select(DB::raw('datediff(updated_at,created_at) '))->get();
         $data = M_Peminjam::where('id', $id)->first();
        $status_sekarang=$data->keadaan;
        if($status_sekarang==1){
            \DB::table('peminjaman')->where('id',$id)->update([
                'keadaan'=>0
            ]);

        }else{
            \DB::table('peminjaman')->where('id',$id)->update([
                'keadaan'=>1
                ]);
             return redirect('v_pengembalian');
        }
    }   

    public function profile()
    {
       $peminjamm=M_Peminjam::all();
        return view('dashboard.profile.index', compact('peminjamm'));
    } 

      public function status($id)
    {
         $data = M_Peminjam::where('id', $id)->first();
        $status_sekarang=$data->status;
        if($status_sekarang==1){
            \DB::table('peminjaman')->where('id',$id)->update([
                'status'=>0
            ]);

        }else{
            \DB::table('peminjaman')->where('id',$id)->update([
                'status'=>1
                ]);
             return redirect()->route('peminjam.index');
        }
    }

     public function keterangan($id)
    {
         $data = M_Peminjam::where('id', $id)->first();
        $status_sekarang=$data->keterangan;
        if($status_sekarang==1){
            \DB::table('peminjaman')->where('id',$id)->update([
                'keterangan'=>0
            ]);

        }else{
            \DB::table('peminjaman')->where('id',$id)->update([
                'keterangan'=>1
                ]);
             return redirect('v_transaksi');
        }
    }      
}
