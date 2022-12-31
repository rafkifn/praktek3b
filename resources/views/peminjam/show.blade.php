@extends('layouts.template')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2> Show </h2>
            </div>
            <div>
            	<form action="{{ route('peminjam.index') }}" method="POST" enctype="multipart/form-data"></form>
                 <a class="btn btn-primary" href="{{ route('peminjam.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>judul buku:</strong>
                    {{ $peminjam->username}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>judul buku:</strong>
                    {{ $peminjamm->judul_buku}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>tanggal peminjam:</strong>
                 {{ $peminjam->tanggal_peminjam}}   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>tanggal pengembalian:</strong>
                 {{ $peminjam->tanggal_pengembalian}}   
                </div>
            </div>
          
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
              <button type="submit" class="btn btn-success">Submit</button>


            </div>
        </div>
@endsection