<?php

namespace App\Models\ProgramKerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';
    protected $primaryKey = 'kode_proker';
    protected $fillable = ['kode_proker','periode','nama_proker', 'penanggungjawab', 'waktu_mulai','waktu_selesai',
     'tujuan','indikator','akun','anggaran','keterangan' ];
    
    // public function Pegawaiid()
	// {
	// 	return $this->belongsTo(Pegawai::class);
	// }

    

}