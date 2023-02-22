<?php

namespace App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'niy';
    protected $fillable = ['niy', 'nama','tempat_lahir','ttl','jk', 'agama','pendidikan','file_ijasah', 'alamat','penempatan',
    'file_skpenempatan','jabatan','file_skjabatan','file_skgolongan','tanggal_masuk','status_kepegawaian', 'tanggal_ppt', 'file_suket','status',
    'tanggal_terminasi','file_skpemberhentian','foto_pegawai','file_ktp','keterangan_pegawai'];
}