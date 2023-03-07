<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akuns extends Model
{
    use HasFactory;
    protected $table = 'akuns';
    protected $primaryKey = 'id';
    protected $fillable = ['id','kode_proker', 'kode_akun','penanggungjawab','periode','jumlah','status_pa',
    'persetujuan_proker','persetujuan_amandemen','created_at'];
}
