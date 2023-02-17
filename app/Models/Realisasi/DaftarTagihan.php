<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTagihan extends Model
{
    use HasFactory;
    protected $table = 'daftartagihan';
    public $incrementing = false;
    protected $fillable = ['id_tagihan','daftar_nis_tagihan','daftar_periode_tagihan','daftar_nominal_tagihan','daftar_namakategori_tagihan'];
 
}
//old
// CREATE or REPLACE VIEW daftartagihan as 
// SELECT tm.nis_tagihan daftar_nis_tagihan, tm.periode_tagihan daftar_periode_tagihan, it.nominal_tagihan daftar_nominal_tagihan, 
// ktm.nama_kategoritagihan daftar_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join kategori_tagihanmurid ktm on it.id_kategoritagihan=ktm.id_kategoritagihan
// left join murid md on (tm.nis_tagihan=md.nomor_induk)

// new daftar tagihan
// CREATE or REPLACE VIEW daftartagihan as 
// SELECT id_tagihan, rincian_nis_tagihan daftar_nis_tagihan, rincian_periode_tagihan daftar_periode_tagihan, SUM(rincian_nominal_tagihan)daftar_nominal_tagihan, rincian_namakategori_tagihan daftar_namakategori_tagihan
// from daftarrinciantagihan
// GROUP BY id_tagihan