<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasBon extends Model
{
    use HasFactory;
    protected $table = 'kas_bon';
    protected $primaryKey = 'no_buktibon';
    public $incrementing = false;
    protected $fillable = ['no_buktibon', 'periode','tanggal_pengajuan','keterangan_bon','proker_bon','akun_bon','anggaran_bon','jumlah_bon','penanggungjawab_bon','tanggal_ptj','status_bon'];
 
}


