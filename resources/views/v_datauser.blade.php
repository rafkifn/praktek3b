@extends('layouts.template')

@section('title')
    Data user
@endsection
@section('content')
    <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>
          <p class="mb-4">Berikut merupakan data anggota library</p>

        @if(Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Anggota 2.0.1</h6>
            </div>
            <div class="card-body">
                <!--  <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    
                </a> -->
              <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <td>No</td>
                      <td>Nama</td>
                      <td>Username</td>
                      <td>Alamat</td>
                      <td>No Telepon</td>
                      <td>Email</td>
                      <!-- <th>Tanggal Lahir</th> -->
                     <!--  <th>Bergabung Pada</th> -->
                      <!-- <th>Action</th> -->
                    <!--   <th>Hapus Data</th> -->
                    </tr>
                    </thead>
                    @php 
                        $no=1
                        @endphp
                    @foreach ($user as $user)
                    <td>
{{$no++}}
                    </td>
            <td>
                {{$user->name}}
                </td>

                    <td>
                        {{$user->username}}
                    </td>

                    <td>
                        {{$user->alamat}}
                    </td>

                    <td>
                        {{$user->notelepon}}
                    </td>

                    <td>
                        {{$user->email}}
                    </td>

                   
                
                  <tbody>
                    
                  
                  </tbody>

      </div>

    </div>
  </div>
</div>
 @endforeach
                    </table>

@endsection
