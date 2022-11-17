<?php

namespace App\Models\BukuBesar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesar extends Model
{
    use HasFactory;
    protected $table = 'buku_besar';
    protected $primaryKey = 'kode';
    protected $fillable = ['kode', 'uraian','anggaran','realisasi','saldo'];
 
}


