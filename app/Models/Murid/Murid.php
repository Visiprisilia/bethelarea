<?php

namespace App\Models\Murid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murid';
    protected $primaryKey = 'nomor_induk';
    protected $fillable = ['nomor_induk', 'nama', 'ttl', 'jk', 'alamat', 'agama', 'nama_ayah', 'nama_ibu', 
    'pekerjaan_ayah', 'pekerjaan_ibu', 'pendidikan_ayah', 'pendidikan_ibu', 'anak_keberapa', 'no_akte','foto_murid','file_kk'];
}