@extends('layouts.core')

@section('container')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">{{ $bukuu->judul_buku }}</h2>

          <!--   <form action="" method="POST" class="mt-3"> -->
              <!--   @csrf
                <button type="submit" class="heart-btn btn btn-primary">
                    <i class=""></i>
                    
                </button>
                
                    <a href="/dashboard/loan/create" class="btn btn-success">Borrow this Book</a>
                
                    <p class="text-danger mt-4">This book is out of stock !</p>
                
            </form> -->
            
            
            <div class="mt-4 justify-content-center">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); border-bottom-right-radius: 10px;">
                    <a href='#' class="text-white text-decoration-none"></a>
                </div>
                
                @if($bukuu->image)
                           <center><img src="{{ asset('storage/'.$bukuu->image) }}" class="img-fluid" alt="inet_err" style="height: 300px;"> </center>
                         @else
                            <img src="https://source.unsplash.com/1200x400?book" class="img-fluid" alt="inet_err" style="height: 300px;">
                        @endif
            </div>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<br>      
<br>
<table>
  <tr>
    <th>Judul Buku :</th>
    <td>{{ $bukuu->judul_buku }}</td>
    <!-- <th>Country</th> -->
  </tr>
  <tr>
    <th>Sinopsis</th>
    <td>{{ $bukuu->sinopsis }}</td>
    <!-- <td>Germany</td> -->
  </tr>
  <tr>
    <th>Stok</th>
    <td>{{ $bukuu->stok }}</td>
    <!-- <td>Mexico</td> -->
  </tr>
<tr>
    <th>Pengarang Buku :</th>
    <td>{{ $bukuu->pengarang_buku }}</td>
    <!-- <td>Mexico</td> -->
  </tr>
  <tr>
    <th>Penerbit</th>
    <td>{{ $bukuu->penerbit }}</td>
    <!-- <td>Mexico</td> -->
  </tr>
<tr>
    <th>Tahun Terbit</th>
    <td>{{ $bukuu->tahun_penerbit }}</td>
    <!-- <td>Mexico</td> -->
  </tr>
  <tr>
    <th>Revisi-ke</th>
    <td>{{ $bukuu->revisian_tahun }}</td>
    <!-- <td>Mexico</td> -->
  </tr>

</table>

           <!--  <article class="my-4">
                <h6 class="mb-3"><strong>Judul Buku :</strong> {{ $bukuu->judul_buku }}</strong></h6>
                <h6 class="mb-3"><strong>Sinopsis :</strong>{{ $bukuu->sinopsis }}</h6>
                <h6 class="mb-3"><strong>Stok :</strong>{{ $bukuu->stok }}</h6>
                <h6 class="mb-3"><strong>Pengarang Buku :</strong> {{ $bukuu->pengarang_buku }}</h6>
                <h6 class="mb-3"><strong>Penerbit :</strong> {{ $bukuu->penerbit }}</h6>
                <h6 class="mb-3"><strong>Tahun Terbit :</strong> {{ $bukuu->tahun_penerbit }} </h6>
                <h6 class="mb-3"><strong>Revisi-Ke :</strong> {{ $bukuu->revisian_tahun }} </h6>
                
            </article> -->
        </div>
    </div>
</div>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">
           <!--  <h6 class="text-success"> comments</h6> -->
        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has("success"))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session("success") }}
            </div>
            @endif
            <form method="POST" action="">
                @csrf
                {{-- @method("create") --}}
                <div class="mb-3">
                    
                    <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror"
                    value="{{ old('body') }}">
                    
                    <trix-editor input="body" placeholder="Add a comment..."></trix-editor>
                    @error("body")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <!-- <button type="submit" class="btn btn-primary">Comment</button> -->
            </form>
        </div>
    </div>    
</div>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        
            <div class="col-md-8 mb-4">
                <div class="comments-heading d-flex align-items-center mb-2">
                    <h6 class="m-0 fw-bold"></h6>
                    <span class="badge bg-transparent text-muted fw-normal">{{ $bukuu->created_at->diffForHumans() }}</span>
                </div>
                
            </div>
        
    </div>
</div>

  <div class="container mt-3 mb-5 ">
    @auth
<!--  <div class="container mt-5 mb-5"> -->
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
             <div class="float-end">
                <a class="btn btn-success mt-2" href="{{ route('peminjam.create') }}"> Meminjam {{ auth()->user()->username }}</a>
            </div>
  <!-- <button type="button" class="btn btn-primary" href="{{route('peminjam.create')}}" >
    Peminjam {{ auth()->user()->username }}
  </button> -->
</div>
</div>
</div>
@endauth


@endsection