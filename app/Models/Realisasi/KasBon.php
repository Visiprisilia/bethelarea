<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasBon extends Model
{
    use HasFactory;
    protected $table = 'kas_bon';
    protected $primaryKey = 'no_bukti';
    public $incrementing = false;
    protected $fillable = ['no_bukti', 'periode','tanggal_pengajuan','keterangan_bon','proker_bon',
    'akun_bon','anggaran_bon','jumlah_bon','jumlah_ptj','bukti_bon','penanggungjawab_bon','dibayarkepada','tanggal_ptj','bukti_ptj','status_bon'];
 
}


