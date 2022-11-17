<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    use HasFactory;
    protected $table = 'kas_masuk';
    protected $primaryKey = 'no_bukti';
    protected $fillable = ['no_bukti', 'tanggal','keterangan','akun','jumlah'];
 
}


