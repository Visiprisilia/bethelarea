<?php

namespace App\Models\BukuBesar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuBesarKas extends Model
{
    use HasFactory;
    protected $table = 'bukubesar_kas';
    protected $primaryKey = 'kode';
    protected $fillable = ['kode', 'uraian','bertambah','berkurang','saldo'];
 
}


