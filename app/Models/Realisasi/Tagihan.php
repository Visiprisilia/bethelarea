<?php

namespace App\Models\Realisasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'tagihan';
    protected $primaryKey = 'id_tagihan';
    public $incrementing = false;
    protected $fillable = ['id_tagihan','nis_tagihan','periode_tagihan','uang_pendaftaran',
    'uang_pengembanganpendidikan','uang_peralatan','uang_seragam','uang_parenting','uang_spp',
    'uang_kegiatan','uang_lainlain'];
 
}
