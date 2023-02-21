<?php

namespace App\Models\Coa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeRek extends Model
{
    use HasFactory;

    protected $table = 'rekening';
    protected $primaryKey = 'kode_rek';
    protected $fillable = ['kode_rek', 'nama_rek'];
}
