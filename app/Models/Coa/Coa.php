<?php

namespace App\Models\Coa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_akun',
        'nama_akun',
        'saldo_normal',
        'keterangan'
    ];
}
