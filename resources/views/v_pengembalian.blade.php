@extends('layouts.template')

@section('title')
    Manajemen Pengembalian
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Pengembalian</h1>
          <p class="mb-4">Berikut merupakan data pengembalian buku perpustakaan </p>

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
              <h6 class="m-0 font-weight-bold text-primary">Manajemen Pengembalian 1.0.1</h6>
            </div>
           <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <td>No</td>
                      <td>Nama User</td>
                      <td>Nama Buku</td>
                      <!-- <td>Kategori Buku</td> -->
                      <td>Tanggal Pengembalian</td>
                      <td>Dikembalikan Tanggal</td>
                      <td>Denda</td>
                     <!--  <td>Administrasi</td>
                      <td>Total Biaya</td>
                      <td>Keadaan</td>
                      <td>Hapus</td> -->
                      <td>keadaan</td>
                      <td>action</td>
 <!-- <button type="submit" class="btn btn-success fas fa-check ">pengembalian</button>
 <button type="submit" class="btn btn-danger">Delete</button> -->
                    </tr>
</thead>
   @foreach ($peminjamm as $peminjam)
        <tr>
<td>{{$peminjam->id}}</td>
<td>{{$peminjam->username}}</td>
<td>{{$peminjam->judul_buku}}</td>
<td>{{$peminjam->tanggal_peminjam}}</td>
<td>{{$peminjam->tanggal_pengembalian}}</td>
<td>-</td>

 <td><label class="label label-success">{{($peminjam->keadaan==1)?'dikembalikan':'belum dikembalikan'}}</label> </td>
 <td>

     @if($peminjam->keadaan == 1)
     <a href="ubah_status/{{$peminjam->id}}" class="btn btn-sm btn-success btn-icon-split btn-sm">Kembalikan</a>
     @else
     <a href="ubah_status/{{$peminjam->id}}" class="btn btn-sm btn-danger btn-icon-split btn-sm">Kembalikan</a>
     @endif
<br>
     <form action="{{ route('peminjam.destroy',$peminjam->id) }}" method="POST">
        
<!--     <a href="{{route('peminjam.edit',$peminjam->id)}}" method="POST" class="btn btn-warning">Edit

    </a> -->
     @csrf
                        @method('DELETE')
    <!--  <button type="submit" class="btn btn-danger btn-icon-split btn-sm" onclick="return confirm('Apakah yakin ingin dihapus ?');">Delete</button> -->
                                    </form>
</td>
                    
 <!-- <td>
<tbody>
    
</tbody>
</div>
</div>

                       
                      </td> -->
</tr>
               
    @endforeach                 
</table>
                 

@endsection
