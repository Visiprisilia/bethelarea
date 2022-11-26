<?php

namespace App\Models\ProgramKerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';
    protected $primaryKey = 'kode_proker';
    public $incrementing = false;
    protected $fillable = ['kode_proker','periode','nama_proker', 'penanggungjawab','tujuan','akun_beban',
    'rencana_anggaran','realisasi_anggaran','rencana_waktu','realisasi_waktu','indikator_pencapaian', 'kinerja_pencapaian',
    'faktor_pendorong','faktor_penghambat','tindaklanjut'];
    
    // public function Pegawaiid()
	// {
	// 	return $this->belongsTo(Pegawai::class);
	// }

  

}