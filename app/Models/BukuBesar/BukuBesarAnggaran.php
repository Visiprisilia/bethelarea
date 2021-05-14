<?php

namespace App\Models\BukuBesar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesarAnggaran extends Model
{
    use HasFactory;
    protected $table = 'bbanggaran';
    public $incrementing = false;
    protected $fillable = ['kode', 'akun', 'nama', 'periode', 'anggaran','realisasi','tgl'];
 
}
//dulu
// CREATE or REPLACE VIEW bbanggaran as 
// SELECT a.kode_proker kode, a.kode_akun akun, c.nama_akun nama, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl
// FROM akuns a join coa c on a.kode_akun=c.kode_akun
// WHERE persetujuan_proker LIKE "Disetujui" OR persetujuan_amandemen LIKE "Disetujui" AND status_amandemens NOT LIKE "Amandemen"
// UNION ALL 
// SELECT km.no_bukti, km.akun, c.nama_akun, km.periode, 0, km.jumlah, km.created_at 
// FROM kas_masuk km join coa c on km.akun=c.kode_akun
// UNION ALL 
// SELECT kk.no_bukti, kk.akun, c.nama_akun, kk.periode, 0, kk.jumlah, kk.created_at
// FROM kas_keluar kk join coa c on kk.akun=c.kode_akun;

// new
// CREATE or REPLACE VIEW bbanggaran as 
// SELECT a.kode_proker kode, a.kode_akun akun, c.nama_akun nama, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl, c.anggaran posisi
// FROM akuns a join coa c on a.kode_akun=c.kode_akun
// WHERE status_amandemens NOT LIKE "Amandemen" AND persetujuan_proker LIKE "Disetujui" OR persetujuan_amandemen LIKE "Disetujui" 
// UNION ALL 
// SELECT km.no_bukti, km.akun, c.nama_akun, km.periode, 0, km.jumlah, km.created_at, c.anggaran
// FROM kas_masuk km join coa c on km.akun=c.kode_akun
// UNION ALL 
// SELECT kk.no_bukti, kk.akun, c.nama_akun, kk.periode, 0, kk.jumlah, kk.created_at, c.anggaran
// FROM kas_keluar kk join coa c on kk.akun=c.kode_akun;

//puji lord
// CREATE or REPLACE VIEW bbanggaran as 
// SELECT a.kode_proker kode, a.kode_akun akun, c.nama_akun nama, a.periode, a.jumlah anggaran, 0 as 'realisasi', a.created_at tgl, c.anggaran posisi
// FROM akuns a join coa c on a.kode_akun=c.kode_akun
// WHERE status_amandemens NOT LIKE "Amandemen" AND persetujuan_proker LIKE "Disetujui" OR persetujuan_amandemen LIKE "Disetujui" 
// UNION ALL 
// SELECT km.no_bukti, km.akun, c.nama_akun, km.periode, 0, km.jumlah, km.created_at, c.anggaran
// FROM kas_masuk km join coa c on km.akun=c.kode_akun
// UNION ALL 
// SELECT kk.no_bukti, kk.akun, c.nama_akun, kk.periode, 0, kk.jumlah, kk.created_at, c.anggaran
// FROM kas_keluar kk join coa c on kk.akun=c.kode_akun
// UNION ALL 
// SELECT kb.no_bukti, kb.akun_bon, c.nama_akun, kb.periode, 0, kb.jumlah_bon, kb.created_at, c.anggaran
// FROM kas_bon kb join coa c on kb.akun_bon=c.kode_akun;