<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    
    public function subDistricts()
    {
        return $this->belongsTo(SubDistrict::class, 'sub_district_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function cctv()
    {
        return $this->hasMany(Cctv::class);
    }
}