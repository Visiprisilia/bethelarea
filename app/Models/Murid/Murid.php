<?php

namespace App\Models\Murid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murid';
    protected $primaryKey = 'nomor_induk';
    protected $fillable = ['nomor_induk', 'nama', 'jk','ttl', 'alamat', 'agama'];
}