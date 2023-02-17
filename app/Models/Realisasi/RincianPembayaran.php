<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianPembayaran extends Model
{
    use HasFactory;
    protected $table = 'rincianpembayaran';
    public $incrementing = false;
    protected $fillable = ['rincian_nis','rincian_periode','rincian_namakategori','rincian_nominal','pembayaran','sisapembayaran'];
 
}