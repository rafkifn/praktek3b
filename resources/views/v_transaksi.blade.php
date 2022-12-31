@extends('layouts.template')

@section('title')
    Transaksi
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
          <p class="mb-4">Berikut merupakan data transaksi buku perpustakaan </p>

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
              <h6 class="m-0 font-weight-bold text-primary">Manajemen Transaksi </h6>
            </div>
           <div class="card-body">
              <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Tahun</td>
                      <td>Bulan</td>
                      <td>Tanggal</td>
                      
                      <td>Username</td>
                      <td>Keterangan</td>
                      <!-- <td>Lama Peminjaman</td>
                      <td>Total Biaya</td> -->
                      <!-- <td>Denda</td>
                      <td>Administrasi</td>
                      <td>Total Biaya</td>
                      <td>Keadaan</td>
                      <td>Diterima Oleh</td> -->
                      <!-- <td>Set Keadaan</td> -->
                      <td>action</td>

                    </tr>
                    </thead>
                    @php 
                        $no=1
                        @endphp
                   @foreach ($peminjamm as $peminjam)
        <tr>
          <td>{{$no++}}</td>
          <td>{{date('Y')}}</td>
          <td>{{date('M')}}</td>
         <td>{{$peminjam->tanggal_peminjam}}</td>
         <td>{{$peminjam->username}}</td>
        <td><label class="label label-success">{{($peminjam->keterangan==1)?'lunas':'belum lunas'}}</label> </td>
<td>
     @if($peminjam->keterangan == 1)
     <a href="keterangan/{{$peminjam->id}}" class="btn btn-sm btn-success btn-icon-split btn-sm">lunas</a>
     @else
     <a href="keterangan/{{$peminjam->id}}" class="btn btn-sm btn-danger btn-icon-split btn-sm">lunas</a>
     @endif
<br>
         <form action="{{ route('peminjam.destroy',$peminjam->id) }}" method="POST">
        
<!--     <a href="{{route('peminjam.edit',$peminjam->id)}}" method="POST" class="btn btn-warning">Edit

    </a> -->
     @csrf
                        @method('DELETE')
     <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this book ?');">Delete</button> -->
                                    </form>
                                </div>
                            </a>
                            </div>
                        </div>
</td>



        </tr>
    @endforeach
  </table> 
@endsection
