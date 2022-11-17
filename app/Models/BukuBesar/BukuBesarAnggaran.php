<?php

namespace App\Models\BukuBesar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesarAnggaran extends Model
{
    use HasFactory;
    protected $table = 'bukubesar_anggaran';
    protected $primaryKey = 'kode_akun';
    protected $fillable = ['kode_akun', 'uraian','akun','jumlah'];
 
}


