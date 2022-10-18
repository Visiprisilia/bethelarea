<?php

namespace App\Models\Periode;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_periode',
        'tanggal_awal',
        'tanggal_akhir'
    ];
}
