<?php

namespace App\Models\SubUnit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnit extends Model
{
    use HasFactory;

    protected $table = 'sub_unit';
    protected $primaryKey = 'kode_subunit';
    public $incrementing = false;
    protected $fillable = ['kode_subunit','nama_subunit','unit_id','status'];
    
}
