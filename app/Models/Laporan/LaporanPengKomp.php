<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengKomp extends Model
{
    use HasFactory;
    protected $table = 'lappengkomp';
    public $incrementing = false;
    protected $fillable = ['akun', 'nama_akun', 'periode', 'realisasi'];
 
}
// CREATE or REPLACE VIEW lappengkomp as 
// select akun, nama_akun, periode, sum(realisasi) realisasi
// from
// bbanggaran
//  group by akun, nama_akun, periode;
// SELECT sum(realisasi) 
// FROM `lappengkomp` WHERE akun LIKE '4%';