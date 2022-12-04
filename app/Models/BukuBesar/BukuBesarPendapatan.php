<?php

namespace App\Models\BukuBesar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesarPendapatan extends Model
{
    use HasFactory;
    protected $table = 'bbpendapatan';
    public $incrementing = false;
    protected $fillable = ['kode', 'anggaran','realisasi','tgl'];
 
}
// CREATE or REPLACE VIEW bbpendapatan as 
// SELECT a.kode_proker kode, a.kode_akun akun, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl
// FROM akuns a 
// WHERE kode_akun LIKE "4%"
// UNION ALL 
// SELECT km.no_bukti, km.akun, km.periode, 0, km.jumlah, km.created_at 
// FROM kas_masuk km 
// WHERE akun LIKE "4%";

