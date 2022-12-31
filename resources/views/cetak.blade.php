<!DOCTYPE html> 
<html lang="en">

<meta charset="UTF-8">

<meta name="viewport" content="width-device-width, initial-scale=1.0"> 
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta nase="csrf-token" content="(( csrf_token() ))">

<style>

table.static {

position: relative;

/*/ left: 39: +/*/ 
border: 1px solig #543535;
}
</style>

<title> CETAK DATA </title>

</head>
<body>

<div class="form-group">

<p align="center"><b>Laporan Data</b></p>

<table class="static" align="center" rules="all" border="1px" style="width: 55%;">
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
                  @endforeach
</table>

</div>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>