<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarRincianTagihan extends Model
{
    use HasFactory;
    protected $table = 'daftarrinciantagihan';
    public $incrementing = false;
    protected $fillable = ['id_tagihan','rincian_nis_tagihan','rincian_periode_tagihan','rincian_nominal_tagihan','rincian_namakategori_tagihan'];
 
}

// new daftar rincian tagihan
// CREATE or REPLACE VIEW daftarrinciantagihan as 
// SELECT tm.id_tagihan id_tagihan tm.nis_tagihan rinciian_nis_tagihan, tm.periode_tagihan rincian_periode_tagihan, it.nominal_tagihan rincian_nominal_tagihan, 
// ktm.nama_kategoritagihan rincian_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join kategori_tagihanmurid ktm on it.id_kategoritagihan=ktm.id_kategoritagihan
// left join murid md on (tm.nis_tagihan=md.nomor_induk)

//dengan id_ite tagihan
// CREATE or REPLACE VIEW daftarrinciantagihan as 
// SELECT tm.id_tagihan id_tagihan, it.id_itemtagihan, tm.nis_tagihan rincian_nis_tagihan, tm.periode_tagihan rincian_periode_tagihan, it.nominal_tagihan rincian_nominal_tagihan, 
// ktm.nama_kategoritagihan rincian_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join kategori_tagihanmurid ktm on it.id_kategoritagihan=ktm.id_kategoritagihan
// left join murid md on (tm.nis_tagihan=md.nomor_induk)

//yang dipakai
// CREATE or REPLACE VIEW daftarrinciantagihan as 
// SELECT tm.id_tagihan id_tagihan, it.id_itemtagihan, tm.nis_tagihan rincian_nis_tagihan, tm.periode_tagihan rincian_periode_tagihan, it.nominal_tagihan rincian_nominal_tagihan, 
// c.nama_akun rincian_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join coa c on it.id_kategoritagihan=coa.id_kategoritagihan
// left join murid md on (tm.nis_tagihan=md.nomor_induk)

//new
// CREATE or REPLACE VIEW daftarrinciantagihan as 
// SELECT tm.id_tagihan id_tagihan, it.id_itemtagihan, tm.nis_tagihan rincian_nis_tagihan, tm.periode_tagihan rincian_periode_tagihan, it.nominal_tagihan rincian_nominal_tagihan, 
// c.kode_akun rincian_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join coa c on it.kode_akun=c.kode_akun
// left join murid md on (tm.nis_tagihan=md.nomor_induk)

// CREATE or REPLACE VIEW gabungankasmasuk as 
// SELECT kasir, akun, periode, sum(jumlah)jumlah
// FROM kas_masuk
// GROUP BY kasir, akun, periode

// CREATE or REPLACE VIEW gabungankasmasuk as 
// SELECT no_bukti, kasir, akun, periode, sum(jumlah)jumlah
// FROM kas_masuk
// GROUP BY kasir, akun, periode

// CREATE or REPLACE VIEW gabungankasmasuk as 
// SELECT it.id_tagihan, no_bukti, kasir, akun, periode, sum(jumlah)jumlah
// FROM kas_masuk km left join tagihan_murid tm on tm.nis_tagihan=km.kasir
// left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// GROUP BY kasir, akun, periode

// CREATE or REPLACE VIEW gabungantagihan as 
// SELECT tm.nis_tagihan rincian_nis_tagihan, tm.periode_tagihan rincian_periode_tagihan, it.nominal_tagihan rincian_nominal_tagihan, c.kode_akun rincian_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join coa c on it.kode_akun=c.kode_akun
// left join murid md on (tm.nis_tagihan=md.nomor_induk)
// GROUP BY rincian_nis_tagihan, rincian_namakategori_tagihan, rincian_periode_tagihan

//new
// CREATE or REPLACE VIEW gabungantagihan as 
// SELECT tm.id_tagihan rincian_id_tagihan, tm.nis_tagihan rincian_nis_tagihan, 
// tm.periode_tagihan rincian_periode_tagihan, it.nominal_tagihan rincian_nominal_tagihan, c.kode_akun rincian_namakategori_tagihan
// FROM tagihan_murid tm left join item_tagihan it on tm.id_tagihan=it.id_tagihan
// left join coa c on it.kode_akun=c.kode_akun
// left join murid md on (tm.nis_tagihan=md.nomor_induk)
// GROUP BY rincian_nis_tagihan, rincian_namakategori_tagihan, rincian_periode_tagihan

//new
// CREATE or REPLACE VIEW rincianpembayaran as 
// SELECT tm.rincian_id_tagihan rincian_id, km.kasir rincian_nis, km.periode rincian_periode, 
// km.akun rincian_namakategori, tm.rincian_nominal_tagihan rincian_nominal, km.jumlah pembayaran, 
// tm.rincian_nominal_tagihan-km.jumlah sisapembayaran
// FROM gabungantagihan tm 
// join gabungankasmasuk km on tm.rincian_nis_tagihan=km.kasir
// join gabungankasmasuk k on tm.rincian_namakategori_tagihan=km.akun
// join gabungankasmasuk m on tm.rincian_namakategori_tagihan=km.akun
// GROUP BY rincian_nis, rincian_namakategori, rincian_periode

//Puji Tuhan
// CREATE or REPLACE VIEW rincianpembayaran as 
// SELECT tm.rincian_id_tagihan rincian_id, km.kasir rincian_nis, km.periode rincian_periode, 
// km.akun rincian_namakategori, tm.rincian_nominal_tagihan rincian_nominal, km.jumlah pembayaran, 
// tm.rincian_nominal_tagihan-km.jumlah sisapembayaran
// FROM gabungantagihan tm 
// join gabungankasmasuk km on tm.rincian_nis_tagihan=km.kasir
// join gabungankasmasuk k on tm.rincian_namakategori_tagihan=km.akun
// join gabungankasmasuk m on tm.rincian_periode_tagihan=km.periode
// GROUP BY rincian_nis, rincian_namakategori, rincian_periode