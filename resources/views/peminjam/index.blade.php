@extends('layouts.template')
 @section('title')
    peminjaman
@endsection
@section('content')
 <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                
           <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
          <p class="mb-4">Berikut merupakan data peminjaman buku perpustakaan </p>
            </div>
            <!-- <div class="float-end">
                <a class="btn btn-success mt-2" href="{{ route('peminjam.create') }}"> Tambah Data Buku </a>
            </div> -->
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <!-- DataTales Example -->
          <div class="card shadow mb-5">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman 2.0.1</h6>
            </div>
            <div class="card-body">
                <!--  <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    
                </a> -->

    <div class="table-responsive">
                <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                 <thead>
        <tr>
            <td>No</td>
            <td>Username</td>
            <td>Judul Buku</td>
            <td>Tanggal Peminjam</td>
            <td>Tanggal Pengembalian</td>
            <td>status</td>
            <td>action</td>
            <!-- <td>Tahun terbit</td>
            <td>Revisi ke</td>
              <td>Image</td> -->
          <!--   <td width="280px">Action</td> -->
        </tr>
</thead>
        @foreach ($peminjamm as $peminjam)
        <tr>
<td>{{$peminjam->id}}</td>
<td>{{$peminjam->username}}</td>
<td>{{$peminjam->judul_buku}}</td>
<td>{{$peminjam->tanggal_peminjam}}</td>
<td>{{$peminjam->tanggal_pengembalian}}</td>
<!-- <td>-</td> -->
<td><label class="label label-success">{{($peminjam->status==1)?'terima':'batal'}}</label>  </td>
 
<td>
      @if($peminjam->status == 1)
     <a href="status/{{$peminjam->id}}" class="btn btn-sm btn-warning btn-icon-split btn-sm">Terima</a>
     @else
     <a href="status/{{$peminjam->id}}" class="btn btn-sm btn-danger btn-icon-split btn-sm">Batal</a>
     @endif
<br>
    @if($peminjam->status == 0)
     <a href="status/{{$peminjam->id}}" class="btn btn-sm btn-warning btn-icon-split btn-sm">Terima</a>
     @else
     <a href="status/{{$peminjam->id}}" class="btn btn-sm btn-danger btn-icon-split btn-sm">Batal</a>
     @endif

</div>
</div>

 <form action="{{ route('peminjam.destroy',$peminjam->id) }}" method="POST">
        
  <!--   <a href="{{route('peminjam.edit',$peminjam->id)}}" method="POST" class="btn btn-warning">Edit

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
</div>
</div>
    @endforeach
</table>
@endsection
