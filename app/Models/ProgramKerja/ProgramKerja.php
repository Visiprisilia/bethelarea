<?php

namespace App\Models\ProgramKerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';
    protected $primaryKey = 'kode_proker';
    protected $fillable = ['kode_proker', 'nama_proker', 'pegawai_id', 'waktu', 'tujuan',  'indikator', 'akun_kode', 'anggaran' ];
    
    // public function Pegawaiid()
	// {
	// 	return $this->belongsTo(Pegawai::class);
	// }

    

}