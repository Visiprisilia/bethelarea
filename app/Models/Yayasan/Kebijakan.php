<?php

namespace App\Models\Yayasan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebijakan extends Model
{
    use HasFactory;

    protected $table = 'kebijakan';
    protected $primaryKey = 'kode_kebijakan';
    protected $fillable = ['kode_kebijakan', 'file_kebijakan', 'keterangan'];
}
