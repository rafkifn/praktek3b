<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Peminjam extends Model
{
    use HasFactory;
protected $table='peminjaman';   
protected $primarykey = 'id'; 
    protected $fillable=[
        'username','judul_buku','tanggal_peminjam','tanggal_pengembalian','keadaan','id_buku','status','keterangan','jumlah'
    ];

public function databuku()
{
    return DB::table('buku')
   
    ->get();
}
}
