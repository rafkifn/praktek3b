<?php

namespace App\Http\Controllers;

use App\Models\M_Buku;
use Illuminate\Http\Request;

class TampilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $bukuu=M_buku::all();
        return view('books', compact('bukuu'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\M_Buku  $m_Buku
     * @return \Illuminate\Http\Response
     */
    public function show(M_Buku $m_Buku)
    {
        return $m_buku;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\M_Buku  $m_Buku
     * @return \Illuminate\Http\Response
     */
    public function edit(M_Buku $m_Buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\M_Buku  $m_Buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_Buku $m_Buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\M_Buku  $m_Buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Buku $m_Buku)
    {
        //
    }
}
