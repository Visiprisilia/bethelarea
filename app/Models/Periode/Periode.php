<?php

namespace App\Models\Periode;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{

    use HasFactory;
    protected $table = 'periode';
    protected $primaryKey = 'kode_periode';
    public $incrementing = false;
    protected $fillable = ['kode_periode', 'nama_periode', 'awal_periode', 'akhir_periode', 'status'];
}
