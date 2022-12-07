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
// SELECT a.kode_proker kode, a.kode_akun akun, c.nama_akun, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl
// FROM akuns a join coa c on a.kode_akun=c.kode_akun
// WHERE kode_akun LIKE "4%"
// UNION ALL 
// SELECT km.no_bukti, km.akun, c.nama_akun, km.periode, 0, km.jumlah, km.created_at 
// FROM kas_masuk km join coa c km.kode_akun=c.kode_akun
// WHERE akun LIKE "4%";

// select akun, nama_akun, periode, sum(anggaran), sum(realisasi)
// from
// bbpendapatan
// group by akun, nama_akun, periode;

// SELECT a.kode_proker kode, a.kode_akun akun, c.nama_akun, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl
// FROM akuns a join coa c on a.kode_akun=c.kode_akun
// UNION ALL 
// SELECT km.no_bukti, km.akun, c.nama_akun, km.periode, 0, km.jumlah, km.created_at 
// FROM kas_masuk km join coa c on km.akun=c.kode_akun
