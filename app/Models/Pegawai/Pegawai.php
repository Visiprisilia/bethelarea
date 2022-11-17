<?php

namespace App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'niy';
    protected $fillable = ['niy', 'nama', 'ttl', 'agama','pendidikan', 'alamat', 'tanggal_masuk', 
    'status_kepegawaian', 'tanggal_ppt', 'file_suket','status','tanggal_termin','keterangan'];

    // public function pengajuan()
	// {
	// 	return $this->hasMany(Pengajuan::class);
	// }
}