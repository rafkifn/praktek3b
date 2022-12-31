@extends('layouts.template')
  
@section('content')
<body style="align:right;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Add</h2>
        </div>
        <div>
            <form method="POST" action="{{ route('bukuu.index') }}" class="mb-5" enctype="multipart/form-data">
            <a class="btn btn-primary" href="{{ route('bukuu.index') }}"> Back</a>
        </div>
    </div>
</div>
   


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('bukuu.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <!-- <label for="judul buku">judul buku*</label> -->
               <!--  <input type="text" name="sinopsis" class="form-control"> -->
<!-- <input type="text" name="sinopsis" class="form-control"> -->
                <strong>Judul Buku:</strong>
                <input type="text" name="judul_buku" class="form-control" placeholder="judul buku">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sinopsis:</strong>
                <input class="form-control" name="sinopsis" placeholder="sinopsis"></input>
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok:</strong>
                <input class="form-control" name="stok" placeholder="stok"></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pengarang Buku:</strong>
                <input class="form-control" name="pengarang_buku" placeholder="pengarang buku"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penerbit:</strong>
                <input class="form-control" name="penerbit" placeholder="penerbit"></input>
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun Terbit:</strong>
                <input class="form-control" name="tahun_penerbit" placeholder="tahun penerbit"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Revisi-Ke:</strong>
                <input class="form-control" name="revisian_tahun" placeholder="revisian-ke"></input>
            </div>
        </div>
         <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gambar</strong>
            <input class="form-control" name="revisian_tahun" placeholder="revisian_tahun"></input>
            <input type="file" class="form-control" id="gambar" name="gambar" aria-label="file example" required>
            <div class="invalid-feedback">Post Image</div>
            </div>
        </div> -->

        <div class="mb-3 col-xs-12 col-sm-12 col-md-12">
            <label for="image" class="form-label"><strong>Post Image</strong></label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
             @error('image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>
   </form>
</form>

</body>


<script>    
    function previewImage() {

    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');    
    
    imgPreview.style.display='block';

    const oFReader=new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload= function(oFREvent){
        imgPreview.src=oFREvent.target.result;
    }
    }
</script>


@endsection
