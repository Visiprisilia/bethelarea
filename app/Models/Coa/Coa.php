<?php

namespace App\Models\Coa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    use HasFactory;

    protected $table = 'coa';
    protected $primaryKey = 'kode_surat';
    protected $fillable = ['kode_akun', 'nama_akun', 'kelompok_rek', 'saldo_normal', 'keterangan'];
}
