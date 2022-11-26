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
    protected $fillable = ['no_bukti', 'periode','tanggal_pengajuan','proker','anggaran','penanggungjawab','tanggal_ptj','status'];
 
}


