@extends('layouts.core')
@section('title')
    Kategori
@endsection
@section('container')
<div class="container mt-5">
    <h2>All Book's Categories</h2>
</div>
<br>
<div class="container">
    <div class="row">
      
        <div class="col-md-4">
            <div class="card mb-2">
                <img src="https://source.unsplash.com/500x400/?" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4><a href="/books?category=" style="text-decoration: none"></a></h4>  
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection