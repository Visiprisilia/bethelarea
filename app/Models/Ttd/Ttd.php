<?php

namespace App\Models\Ttd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ttd extends Model
{
    use HasFactory;

    protected $table = 'ttd';
    protected $primaryKey = 'id_ttd';
    public $incrementing = false;
    protected $fillable = ['id_ttd','ketua_yayasan','bendahara_yayasan','kepala_sekolah','bagian_administrasi',
    'bendahara_sekolah',''];
    
}
