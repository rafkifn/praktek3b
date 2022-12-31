<?php

namespace App\Http\Controllers;
use App\Models\M_Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukuu=M_Buku::latest()->get();
        return view('buku.index', compact('bukuu'));
        // ->with('1',(request()->input('page',1)-1)*5);
        // $bukuu=M_buku::all();
        // return view('index')->with(['buku'=>$buku]);
          // return view('buku.index',compact('bukuu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $bukuu=M_buku::all();
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        return $request->file('image')->store('post-images');    
// $bukuu=$request->except(['_token']);
// M_Buku::insert($bukuu);
// return redirect('/index');

        $validatedData = $request->validate([
            'judul_buku' => 'required',
            'sinopsis' => 'required',
            'stok' => 'required',
            'pengarang_buku' => 'required',
            'penerbit' => 'required',
            'tahun_penerbit' => 'required',
            'revisian_tahun' => 'required',
            'image'=>'image|file|max:1024',
        ]);
        
      //    $file=$request->file('image');
      //    $file=$request->image;

      if($request->file("image")) {
            $validatedData["image"] = $request->file("image")->store('post-images');
        }
        M_Buku::create($validatedData);
       
        return redirect()->route('bukuu.index')
                        ->with('success',' created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(M_Buku $bukuu)
    {
        return view('buku.show',compact('bukuu'));
    }
  
    public function edit(M_Buku $bukuu)
    {
        return view('buku.edit',compact('bukuu'));
    }

    public function update(Request $request, M_Buku $bukuu)
    {
        $rules =[
            'judul_buku' => 'required',
            'sinopsis' => 'required',
            'stok' => 'required',
             'pengarang_buku' => 'required',
            'penerbit' => 'required',
            'tahun_penerbit' => 'required',
            'revisian_tahun' => 'required',
            'image'=>'image|file|max:1024',
        ];

        $validatedData=$request->validate($rules);

      if($request->file("image")) {
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
            $validatedData["image"] = $request->file("image")->store('post-images');
        }
        M_Buku::where('id', $bukuu->id)
        ->update($validatedData);
        
      
        return redirect()->route('bukuu.index')
                        ->with('success',' edit berhasil');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Buku $bukuu)
    {
          if($bukuu->image){
            Storage::delete($bukuu->image);
        }
        $bukuu->delete();
        return redirect()->route('bukuu.index')
        ->with('success','delete berhasil');
    }
}
