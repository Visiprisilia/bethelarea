<?php

namespace App\Models\BukuBesar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesarBiaya extends Model
{
    use HasFactory;
    protected $table = 'bbbiaya';
    public $incrementing = false;
    protected $fillable = ['kode', 'akun', 'periode', 'anggaran','realisasi','tgl'];
 
}
// CREATE or REPLACE VIEW bbbiaya as 
// SELECT a.kode_proker kode, a.kode_akun akun, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl
// FROM akuns a 
// WHERE kode_akun LIKE "5%"
// UNION ALL 
// SELECT kk.no_bukti, kk.akun, kk.periode, 0, kk.jumlah, kk.created_at
// FROM kas_keluar kk
// WHERE akun LIKE "5%";
