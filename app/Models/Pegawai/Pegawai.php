<?php

namespace App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'kode_pegawai';
    protected $fillable = ['kode_pegawai', 'nama_pegawai', 'jabatan_pegawai','pendidikan', 'tanggal_masuk', 'status_kepegawaian', 'tanggal_ppt'];

    public function pengajuan()
	{
		return $this->hasMany(pengajuan::class);
	}
}
