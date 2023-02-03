<?php

namespace App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'niy';
    protected $fillable = ['niy', 'nama','tempat_lahir','ttl','jk', 'agama','pendidikan', 'alamat','penempatan','tanggal_masuk', 
    'status_kepegawaian', 'tanggal_ppt', 'file_suket','status','tanggal_terminasi','foto_pegawai','file_ktp','keterangan_pegawai'];

    // public function pengajuan()
	// {
	// 	return $this->hasMany(Pengajuan::class);
	// }
}