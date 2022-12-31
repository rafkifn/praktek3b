@extends('layouts.core')
@section('title')
    Katalog Buku
@endsection
@section('container')
<body>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@if($bukuu->count())
<h1 class="mb-5 text-center"></h1>
    <div class="container justify-content-center mt-5">
        <div class="col-md-6 d-flex">
            <form action="/books" method="GET" class="me-3">
                <!-- @if (request(["pengarang_buku"]))
                    <input type="hidden" name="pengarang_buku" value="{{ request('pengarang_buku') }}">
                @endif
                @if (request(["judul_buku"]))
                    <input type="hidden" name="judul_buku" value="{{ request('judul_buku') }}">
                @endif -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search a book..." name="search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{__('proses peminjaman berhasil silahkan datang ke perpustakaan untuk mengambil buku, peminjaman akan dibatalkan apabila buku tidak diambil dalam waktu 24 jam, jangan lupa untuk membawa biaya adminitrasi ')}}

</div>
@endif
           <!--  <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Search Author
                </a>
           
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                   
                        <li><a class="dropdown-item" href=""></a></li>   
               
                </ul>
            </div> -->
        </div>
    </div>

    <div class="container mt-5" data-aos="fade-up" data-aos-delay="200">
        <div class="row">
           @foreach ($bukuu as $buku)
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); border-bottom-right-radius: 10px;">
                            <a href='' class="text-white text-decoration-none"></a>
                        </div>

                        @if($buku->image)
                            <img src="{{ asset('storage/'.$buku->image) }}" class="img-fluid" alt="inet_err" style="height: 300px;">
                         @else
                            <img src="https://source.unsplash.com/1200x400?book" class="img-fluid" alt="inet_err" style="height: 300px;">
                        @endif

                        <div class="card-body">
                            <h6 class="card-title">{{ $buku->title }}</h6>
                            <p class="card-text"><strong>{{$buku->judul_buku}}</strong></p>
                            <p class="card-text">by <strong>{{$buku->pengarang_buku}}</strong></p>
                            <span class="badge text-secondary bg-transparent mb-2 px-0 d-flex">
                                <!-- <h6 class="mx-1"><i class='bi bi-heart-fill'></i> </h6>
                                <h6 class="mx-1"><i class='bi bi-chat-right-dots-fill'></i>  -->
                                </h6>
                            </span>
                            <div class="buttons-group">
                                <a href="{{url ('v_detail')}}/{{$buku->id}}" class="text-decoration-none btn btn-primary mb-2">Details</a>                     
                                <p class="card-text"><small class="text-muted">Last updated {{ $buku->created_at->diffForHumans() }}</small></p> 
                            </div>
                        </div>
                    </div>
                </div>
       @endforeach   
        </div>
    </div>

    <div class="container paginator-btn mt-5 d-flex justify-content-center mb-5">
       
    </div>
    @else
    <p class="text-center fs-4">pencarian tidak ditemukan</p>
    @endif
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init({
        once: true,
      });
  </script>  
    </body>
@endsection