<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'tagihan_murid';
    protected $primaryKey = 'id_tagihan';
    public $incrementing = false;
    protected $fillable = ['id_tagihan','nis_tagihan','periode_tagihan'];
 
}

// CREATE or REPLACE VIEW daftartagihan as 
// SELECT tm.nis_tagihan, tm.periode_tagihan, it.nominal_tagihan, ktm.nama_kategoritagihan
// FROM tagihan_murid tm join item_tagihan it on tm.id_tagihan=it.id_tagihan
// join kategori_tagihanmurid ktm on it.id_kategoritagihan=ktm.id_kategoritagihan
// join murid md on (tm.nomor_induk=md.nomor_induk)
