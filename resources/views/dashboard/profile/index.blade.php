@extends('layouts.core4')

@section("container")
    <div class="container-fluid d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom dashboard-title">
        <h2 class="text-muted">{{ auth()->user()->name }}'s Profile</h2>
    </div>

    <div class="container-fluid profile-container mb-4">
        <h5><strong>Your Personal Informations</strong></h5>

        @if (session()->has("success"))
        <div class="alert alert-success col-md-6" role="alert">
            {{ session("success") }}
        </div>
        @endif
        @php 
                        $no=1
                        @endphp
@foreach ($peminjamm as $peminjam)
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            
            
            @if($peminjam->keadaan == 1)
           
    <div class="ribbon-wrapper ribbon-lg">
        <div class="ribbon bg-success text-lg">
            kembalikan
        </div>
    </div>
     @endif
      @if($peminjam->keadaan == 0)

    <div class="ribbon-wrapper ribbon-lg">
        <div class="ribbon bg-danger text-lg">
            belum kembalikan
        </div>
    </div>
     @endif
        </div>

    </div>

</div>
       @endforeach
@endsection