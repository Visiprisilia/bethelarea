<?php

namespace App\Models\BukuBesar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesarKas extends Model
{
    use HasFactory;
    protected $table = 'bbkas';
    public $incrementing = false;
    protected $fillable = ['no_bukti', 'tanggal','periode','akun','keterangan','bertambah','berkurang','tgl'];
 
}
// CREATE or REPLACE VIEW bbkas as 
// SELECT km.no_bukti, km.tanggal_pencatatan tanggal, km.periode, km.akun, km.keterangan, km.jumlah bertambah, 0 as 'berkurang',km.created_at tgl
// FROM kas_masuk km 
// UNION ALL 
// SELECT kk.no_bukti, kk.tanggal_pencatatan, kk.periode, kk.akun, kk.keterangan, 0, kk.jumlah, kk.created_at
// FROM kas_keluar kk;

// //new
// CREATE or REPLACE VIEW bbkas as 
// SELECT km.no_bukti, km.tanggal_pencatatan tanggal, km.periode, km.akun, km.keterangan, km.jumlah bertambah, 0 as 'berkurang',km.created_at tgl
// FROM kas_masuk km 
// UNION ALL 
// SELECT kk.no_bukti, kk.tanggal_pencatatan, kk.periode, kk.akun, kk.keterangan, 0, kk.jumlah, kk.created_at
// FROM kas_keluar kk
// UNION ALL
// SELECT kb.no_bukti, kb.tanggal_pengajuan, kb.periode, kb.akun_bon, kb.keterangan_bon, 0, kb.jumlah_bon, kb.created_at
// FROM kas_bon kb;