@extends('layouts.template')
 @section('title')
    Data Buku
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                
                <h2>Tambah Data Buku</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success mt-2" href="{{ route('bukuu.create') }}"> Tambah Data Buku </a>
            </div>
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
              <h6 class="m-0 font-weight-bold text-primary">Data Buku 2.0.1</h6>
            </div>
            <div class="card-body">
                 <!-- <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    
                </a> -->

    <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead>       
        <tr>
            <td >No</td>
            <td>Judul Buku</td>
            <td>Sinopsis</td>
            <td>Stok</td>
            <td>Pengarang Buku</td>
            <td>Penerbit</td>
            <td>Tahun terbit</td>
            <td>Revisi ke</td>
              <td>Image</td>
            <td width="280px">Action</td>
        </tr>
</thead>
        @foreach ($bukuu as $buku)
        <tr>
<td class="text-capitalize">{{$buku->id}}</td>
<td class="text-capitalize">{{$buku->judul_buku}}</td>
<td>{{$buku->sinopsis}}</td>
<td>{{$buku->stok}}</td>
<td>{{$buku->pengarang_buku}}</td>
<td>{{$buku->penerbit}}</td>
<td>{{$buku->tahun_penerbit}}</td>
<td>{{$buku->revisian_tahun}}</td>
<td>
    <!-- {{$buku->image}} -->
    
     <img src="{{ asset('storage/'.$buku->image) }}" width="50" height="50" class="img img-responsive"/>
                    </td>
</td>
<td> 
    </div>
    </div>

      <!-- <div class="col-xl-3 col-md-6 mb-4"> -->
                          
                            <a href="{{ route('bukuu.show',$buku->id)}}">
                                <!-- <div class="card-body">
                                    <div class="col-auto">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div> -->
                                       <!--  </div>
                                    <div class="row no-gutters align-items-center"> -->
                                         <!-- <div class="col mr-2"> -->
                                     <!--        {{$buku->judul_buku}} -->
                                          <!--   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> -->
                                                <!-- {{$buku->sinopsis}} -->
                                            <!-- </div>
                                        </div>
                                    </div> -->
                      
    <form action="{{ route('bukuu.destroy',$buku->id) }}" method="POST">
        
    <a href="{{route('bukuu.edit',$buku->id)}}" method="POST" class="btn btn-warning">Edit

    </a>
     @csrf
                        @method('DELETE')
     <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus ?');"> 
                                <span class="text">Hapus</span></button>
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
        </table>
@endsection