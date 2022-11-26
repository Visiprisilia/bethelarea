<?php

namespace App\Models\Unit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $primaryKey = 'kode_unit';
    
    protected $fillable = ['kode_unit', 'nama_unit'];
	}
