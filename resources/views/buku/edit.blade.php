@extends('layouts.template')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Edit </h2>
            </div>
            <div>
                    <form action="{{ route('bukuu.update',$bukuu->id) }}" class="mb-5" method="POST" enctype="multipart/form-data">
        @method('PUT')
   @csrf
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
  

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku:</strong>
                    <input type="text" name="judul buku" class="form-control" value="{{$bukuu->judul_buku}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                <strong>Sinopsis:</strong>
                    <input type="text" name="sinopsis" class="form-control" value="{{$bukuu->sinopsis}}"> 
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                <strong>Stok:</strong>
                    <input type="text" name="stok" class="form-control" value="{{$bukuu->stok}}"> 
                </div>
            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                <strong>Pengarang Buku:</strong>
                    <input type="text" name="pengarang buku" class="form-control" value="{{$bukuu->pengarang_buku}}"> 
                </div>
            </div>
            
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                <strong>Penerbit:</strong>
                    <input type="text" name="penerbit" class="form-control" value="{{$bukuu->penerbit}}"> 
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                <strong>Tahun Terbit:</strong>
                    <input type="text" name="tahun penerbit" class="form-control" value="{{$bukuu->tahun_penerbit}}"> 
                </div>
            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                <strong>Revisi-Ke:</strong>
                    <input type="text" name="revisian_tahun" class="form-control" value="{{$bukuu->revisian_tahun}}"> 
                </div>
            </div>

<div class="mb-3 col-xs-12 col-sm-12 col-md-12">
            <label for="image" class="form-label"><strong>Post Image</strong></label>
            <input type="hidden" name="oldImage" value="{{ $bukuu->image }}">
            @if($bukuu->image)
            <img src="{{ asset('storage/' . $bukuu->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
             @error('image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
</form>
    </form>
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