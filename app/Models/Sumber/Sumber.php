<?php

namespace App\Models\Sumber;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    use HasFactory;
    protected $table = 'sumber';
    protected $primaryKey = 'id_sumber';
    
    protected $fillable = ['id_sumber', 'nama_sumber'];
	}
