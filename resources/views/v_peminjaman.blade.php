@extends('layouts.template')

@section('title')
    Manajemen Peminjaman
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
          <p class="mb-4">Berikut merupakan data peminjaman buku perpustakaan </p>

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
              <h6 class="m-0 font-weight-bold text-primary">Manajemen Peminjaman </h6>
            </div>
           
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <!-- <th>Kategori Buku</th> -->
                      <th>Nama Buku</th>
                      
                      <th>Tanggal Peminjaman</th>
                      <th>Tanggal Pengembalian </th>
                      <th>Lama Peminjaman</th>
                      <th>Total Biaya</th>
                      <!-- <th>Denda</th>
                      <th>Administrasi</th>
                      <th>Total Biaya</th>
                      <th>Keadaan</th>
                      <th>Diterima Oleh</th> -->
                      <!-- <th>Set Keadaan</th> -->
                      <th>Hapus</th>

                    </tr>
                    </thead>
                     @foreach ($peminjamm as $peminjam)
        <tr>
<td>{{$peminjam->id}}</td>
<td>{{$peminjam->username}}</td>
<td>{{$peminjam->judul_buku}}</td>
<td>{{$peminjam->tanggal_peminjam}}</td>
<td>{{$peminjam->tanggal_pengembalian}}</td>

<td>
    </td>
</tr>
</div>
</div>
    @endforeach
      </table>           
@endsection
