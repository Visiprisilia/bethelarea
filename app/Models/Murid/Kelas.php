<?php

namespace App\Models\Murid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'kode_kelas';
    
    protected $fillable = ['kode_kelas', 'nama_kelas','keterangan_kelas'];
	}
