<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    use HasFactory;
    protected $table = 'kas_masuk';
    protected $primaryKey = 'no_bukti';
    public $incrementing = false;
    protected $fillable = ['no_bukti','periode','tanggal_pencatatan','keterangan','progja','akun','sumber','jumlah','kasir','diterimadari'];
 
}


