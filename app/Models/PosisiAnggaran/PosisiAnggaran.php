<?php

namespace App\Models\PosisiAnggaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosisiAnggaran extends Model
{
    use HasFactory;
    protected $table = 'posisi_anggaran';
    protected $primaryKey = 'kode_akun';
    protected $fillable = ['kode_akun', 'nama_akun','anggaran','realisasi','sisa'];
 
}


