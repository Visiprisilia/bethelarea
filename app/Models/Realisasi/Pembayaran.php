<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    public $incrementing = false;
    protected $fillable = ['rincian_nis','rincian_periode','rincian_namakategori','rincian_nominal','pembayaran','sisapembayaran'];
 
}

//yangdipakai
// CREATE or REPLACE VIEW pembayaran as 
// SELECT rincian_nis, rincian_periode, rincian_namakategori, sum(rincian_nominal) rincian_nominal, sum(pembayaran) pembayaran, sum(rincian_nominal)-sum(pembayaran) sisapembayaran  
// FROM rincianpembayaran
// GROUP BY rincian_nis, rincian_periode