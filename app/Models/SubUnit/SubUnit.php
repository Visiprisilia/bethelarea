<?php

namespace App\Models\SubUnit;

use App\Models\Unit\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnit extends Model
{
    use HasFactory;
    protected $table = 'sub_unit';
    protected $primaryKey = 'kode_subunit';
    protected $fillable = ['kode_subunit', 'nama_subunit', 'unit_id', 'status'];
 
    public function unit()
	{
		return $this->belongsTo(Unit::class);
	}
}


