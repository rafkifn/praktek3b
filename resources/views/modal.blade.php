<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
 <form action="" method="post" class="form-horizontal">
          
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form Peminjaman</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Username:</label>
    <div class="col-sm-10">
      <input type="name" class="form-control" id="username" placeholder="Username" >
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Judul Buku:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Judul Buku" placeholder="Judul Buku" value="{{ $bukuu->judul_buku }}">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Peminjam:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="peminjam" placeholder="Peminjam">
    </div>
  </div>
  <br>
    <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pengembalian:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="Pengembalian" placeholder="Pengembalian">
    </div>
  </div>
      </div>
<br>
 

      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
      </div>

    </div>
  </div>
</div>