<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPosisiAnggaran extends Model
{
    use HasFactory;
    protected $table = 'lapposisianggaran';
    public $incrementing = false;
    protected $fillable = ['kode','akun', 'nama', 'periode', 'anggaran','realisasi','posisi_anggaran'];
 
}
// CREATE or REPLACE VIEW lapposisianggaran as 
// select akun, nama_akun, periode, sum(anggaran)anggaran, sum(realisasi)posisi_anggaran
// from
// bbanggaran
// group by akun, nama_akun, periode;

//yang dipakai
// CREATE or REPLACE VIEW lapposisianggaran as 
// select akun, nama, periode, sum(anggaran)anggaran, sum(realisasi)realisasi, sum(anggaran)-sum(realisasi) posisi_anggaran 
// from
// bbanggaran
// group by akun, nama, periode;

// CREATE or REPLACE VIEW lapposisianggaran as 
// SELECT a.kode_akun akun, c.nama_akun, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl
// FROM akuns a join coa c on a.kode_akun=c.kode_akun
// UNION ALL 
// SELECT km.no_bukti, km.akun, c.nama_akun, km.periode, 0, km.jumlah, km.created_at 
// FROM kas_masuk km join coa c on km.akun=c.kode_akun
// UNION ALL 
// SELECT kk.no_bukti, kk.akun, c.nama_akun, kk.periode, 0, kk.jumlah, kk.created_at
// FROM kas_keluar kk join coa c on kk.akun=c.kode_akun;
// group by akun, nama_akun, periode;