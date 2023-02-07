<?php

namespace App\Models\ProgramKerja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;

    protected $table = 'anggaran';
    protected $primaryKey = 'kode_proker';
    public $incrementing = false;
    protected $fillable = ['kode_proker','periode','nama_proker','penanggungjawab', 'waktu_mulai', 'waktu_selesai','tujuan',
     'indikator','keterangan_proker','status_proker','catatan','tanggal_amandemen','anggaran_amandemen','status_amandemen'];
}

    //new
    // CREATE or REPLACE VIEW anggaran as 
    // SELECT program_kerja.kode_proker,periode,nama_proker, penanggungjawab, waktu_mulai,waktu_selesai, tujuan,indikator,anggaran,keterangan_proker,status_proker,catatan, tanggal_amandemen, anggaran_amandemen, status_amandemen
    // from program_kerja
    // LEFT JOIN 

    // (SELECT kode_prokeramandemen, `tanggal_amandemen`,`anggaran_amandemen`,`status_amandemen` FROM `amandemen` WHERE id_amandemen IN (SELECT max(id_amandemen) FROM amandemen GROUP BY kode_prokeramandemen))
    // amandemen on program_kerja.kode_proker=amandemen.kode_prokeramandemen

