<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    use HasFactory;
    protected $table = 'kas_keluar';
    protected $primaryKey = 'no_bukti';
    public $incrementing = false;
    protected $fillable = ['no_bukti', 'periode','tanggal_pencatatan','keterangan','akun','prokers','jumlah','anggaran','bukti','penanggungjawab','kasir'];
 
}


