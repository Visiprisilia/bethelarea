<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPosisiAnggaran extends Model
{
    use HasFactory;
    protected $table = 'lapposisianggaran';
    public $incrementing = false;
    protected $fillable = ['akun', 'nama_akun', 'periode', 'anggaran','posisi_anggaran'];
 
}
// CREATE or REPLACE VIEW lapposisianggaran as 
// select akun, nama_akun, periode, sum(anggaran)anggaran, sum(realisasi)posisi_anggaran
// from
// bbanggaran
// group by akun, nama_akun, periode;