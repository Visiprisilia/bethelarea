<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akuns extends Model
{
    use HasFactory;
    protected $table = 'akuns';
    protected $fillable = ['kode_proker', 'kode_akun','periode','jumlah'];
}
