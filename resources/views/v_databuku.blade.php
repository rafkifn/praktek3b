@extends('layouts.template')

@section('title')
    Manajemen Buku
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
          <p class="mb-4">Berikut merupakan data buku perpustakaan </p>

          @if(Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
          @endif

          @if(Session::has('gagal'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manajemen Buku1.0.1</h6>
            </div>
            <div class="card-body">
                <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Data buku</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                   <tr>
            <td>No</td>
            <td>judul buku</td>
            <td>sinopsis</td>
            <td>pengarang buku</td>
            <td>penerbit</td>
            <td>tahun penerbit</td>
            <td>revisian tahun</td>
              <td>image</td>
            <td width="280px">Action</td>
        </tr>

        @foreach ($bukuu as $buku)
        <tr>
<td>{{$buku->id}}</td>
<td>{{$buku->judul_buku}}</td>
<td>{{$buku->sinopsis}}</td>
<td>{{$buku->pengarang_buku}}</td>
<td>{{$buku->penerbit}}</td>
<td>{{$buku->tahun_penerbit}}</td>
<td>{{$buku->revisian_tahun}}</td>
<td>
    {{$buku->image}}
     <!-- <img src="{{ asset($buku->image) }}" width="50" height="50" class="img img-responsive"/> -->
                    </td>
</td>
                  </thead>
                 
@endsection
