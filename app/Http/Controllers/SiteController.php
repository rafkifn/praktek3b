<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\M_Buku;
use App\Models\Developers;
class SiteController extends Controller
{
     public function indexx()
    {
        return view('indexx');
    }

     public function book()
    {
        return view('book');
    }

     public function books()
    {
        return view('books',[
            "judul_buku"=>"All bukuu",
            "sinopsis"=>"All bukuu",
            "bukuu"=>M_buku::latest()->filter(request(['search']))->get()
        ]);

        // $bukuu=M_buku::all();
        // return view('books', compact('bukuu'));
        //  return view("books", [
        //     "name" => env("APP_NAME"),
        //     "pageName" => "Books",
        //     "bukuu" => M_Buku::latest()->filter(request(["search", "sinopsis"]))->withQueryString(),
        //     "bukuu" => M_Buku::all(),
        // ]);
    }

     public function show(M_Buku $bukuu)
    {
        return $bukuu;
    }

     public function categories()
    {
        return view('categories');
    }

 public function developer()
    {
        return view("developer",[
            "name" => env("APP_NAME"),
            "pageName" => "Developers",
            "developers" => Developers::all()
        ]);
    }

public function detail($id)
    {
        // $bukuu = M_Buku::all();
        // $bukuu=M_Buku::find($id);
        $bukuu = M_Buku::where('id', $id)->first();
        return view('v_detail',compact('bukuu'));
    }

 // public function cetak()
 //    {
 //         $user = User::all();
 //        return view('cetak',compact('user'));
 //    }

 public function transaksi()
    {
        return view('v_transaksi');
    }

 public function bizz()
    {
        return view('bizz');
    }

public function getRouteKeyName()

{
    return 'slug';
}    
}
