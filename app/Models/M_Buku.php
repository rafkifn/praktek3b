<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\softDeletes;


class M_Buku extends Model
{
    // use softDeletes;
    use HasFactory;
protected $table='buku';   
protected $primarykey = 'id'; 
    protected $fillable=[
        'judul_buku','sinopsis','stok','pengarang_buku','penerbit','tahun_penerbit','revisian_tahun','image'
    ];

    protected $hidden;


public function scopeFilter($query, array $filters)
{
     if(isset($filters['search'])? $filters['search'] : false){
            return $query->where('judul_buku','like','%'. $filters['search'].'%')
                  ->orWhere('sinopsis','like','%'. $filters['search'].'%');
        }
}
    public function bookdetail()
    {
        return $this->belongsTo('App\Http\Controller\SiteController', 'id');
    }
}




