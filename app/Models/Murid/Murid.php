<?php

namespace App\Models\Murid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murid';
    protected $primaryKey = 'nomor_induk';
    protected $fillable = ['nomor_induk','nomor_isn', 'kelas','nama', 'tempat_lahir','ttl', 'jk', 'alamat', 'agama', 'nama_ayah', 'nama_ibu', 
    'pekerjaan_ayah', 'pekerjaan_ibu', 'pendidikan_ayah', 'pendidikan_ibu','ktp_ayah','ktp_ibu', 'anak_keberapa', 'no_akte','file_akte',
    'foto_murid','file_kk','kontak','tanggal_penerimaan','file_suratpenerimaan','tanggal_kenaikankelas','file_suratkenaikankelas','tanggal_raport',
'file_raport','status_murid','tanggal_kelulusan','file_suratkelulusan'];
}