@extends('layouts.template')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2> Show </h2>
            </div>
            <div>
            	<form action="{{ route('buku.index') }}" method="POST" enctype="multipart/form-data"></form>
                 <a class="btn btn-primary" href="{{ route('buku.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>judul buku:</strong>
                    {{ $buku->judul_buku}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>sinopsis:</strong>
                 {{ $buku->sinopsis}}   
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Stok:</strong>
                 {{ $buku->stok}}   
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>pengarang buku:</strong>
                 {{ $buku->pengarang_buku}}   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>penerbit:</strong>
                 {{ $buku->penerbit}}   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>tahun penerbit:</strong>
                 {{ $buku->tahun_penerbit}}   
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>revisian tahun:</strong>
                 {{ $buku->revisian_tahun}}   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
              <button type="submit" class="btn btn-success">Submit</button>


            </div>
        </div>
@endsection