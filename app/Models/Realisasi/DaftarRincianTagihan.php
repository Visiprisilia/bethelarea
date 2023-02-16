<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarRincianTagihan extends Model
{
    use HasFactory;
    protected $table = 'daftarrinciantagihan';
    public $incrementing = false;
    protected $fillable = ['rincia_nis_tagihan','rincian_periode_tagihan','rincian_nominal_tagihan','rincian_namakategori_tagihan'];
 
}

//new daftar rincian tagihan
// CREATE or REPLACE VIEW daftarrinciantagihan as 
// SELECT tm.nis_tagihan rinciian_nis_tagihan, tm.periode_tagihan rincian_periode_tagihan, it.nominal_tagihan rincian_nominal_tagihan, 
// ktm.nama_kategoritagihan rincian_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join kategori_tagihanmurid ktm on it.id_kategoritagihan=ktm.id_kategoritagihan
// left join murid md on (tm.nis_tagihan=md.nomor_induk)
