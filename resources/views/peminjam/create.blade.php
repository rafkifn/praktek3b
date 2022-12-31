@extends('layouts.template2')
 @section('title')
    peminjam
@endsection
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<style>
      body{
      background-image:url("../img/lib.jpg");
background-repeat: no-repeat;
background-size: 100%;

    }
    </style>


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
<br>
     <div class="row justify-content-center animate__animated animate__zoomIn">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-center text-primary">{{ __('FORM PEMINJAMAN') }}</div>
        <div class="card-body">

 <form method="POST" action="{{ route('peminjam.index') }}" class="mb-5" enctype="multipart/form-data">
            <a class="btn btn-primary" href="{{ route('indexx') }}"> Back</a>

                <input type="hidden" name="total" id="total">
     <div class="row">
         @auth
        <div class="col-md-12 col-form-label text-md-end">
            <div class="form-group">
                <strong>Username: </strong>
                <input type="text" value="{{ auth()->user()->username }}" name="username" class="form-control" placeholder="username" readonly>
            </div>
        </div>             
@endauth
 <!--  <div class="col-md-12 col-form-label text-md-end">
            <div class="form-group">
                <strong>buku :</strong>
                <input type="text"  name="id_buku" class="form-control" placeholder="id_buku">
            </div>
        </div> -->
       


        <div class="col-md-12 col-form-label text-md-end">
            <div class="form-group">
                <strong>Judul Buku:</strong>
                <input type="text"  name="judul_buku" class="form-control" placeholder="judul buku">
            </div>
        </div>
       
 <div class="col-md-12 col-form-label text-md-end">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="text"  name="jumlah" class="form-control" placeholder="jumlah">
            </div>
        </div>

<div class="col-md-12 col-form-label text-md-end">
            <div class="form-group">
                <strong>Buku:</strong>
                <select name="id_buku" class="form-control">
                    <option>--Pilih Buku--</option>\
                    @foreach($buku as $data)
                        <option value="{{$data->id}}">{{$data->judul_buku}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12 col-form-label text-md-end">
            <div class="form-group">
                <strong>tanggal peminjaman:</strong>
                <input class="form-control" type="date" name="tanggal_peminjam" id="tanggal_peminjam" placeholder="tanggal peminjaman"> @error('tanggal_peminjam')<small class="text-danger">{{$message}}</small>@enderror</input>
            </div>
        </div>
        <div class="col-md-12 col-form-label text-md-end">
            <div class="form-group">
                <strong>tanggal pengembalian:</strong>
                <input class="form-control" type="date" name="tanggal_pengembalian" placeholder="tanggal pengembalian"></input>
            </div>
        </div>
        
   <div class="form-group row">
                                <label for="totalrp" class="col-md-12 col-form-label text-md-end">Biaya</label>
                                <div class="col-lg-8">
                                    <input type="text" id="totalrp" class="form-control" value="Rp 5000" readonly>
                                </div>
                            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Form Peminjam</h2>
        </div>
        <div> -->
            
        </div>
    </div>
</div>
   
<form action="" method="POST">
    @csrf
   
        
        
      
       
        
    </div>
   </form>
</form>
