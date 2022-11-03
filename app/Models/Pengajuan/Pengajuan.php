<?php

namespace App\Models\Pengajuan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $primaryKey = 'kode_proker';
    protected $fillable = ['kode_proker', 'proker', 'pegawai_id', 'tujuan', 'akun_kode', 'anggaran', 'waktu', 'indikator' ];
    
    public function Pegawai()
	{
		return $this->belongsTo(Pegawai::class);
	}

    

}