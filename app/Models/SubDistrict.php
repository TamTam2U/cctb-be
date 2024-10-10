<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $table = 'sub_districts';
    
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function area()
    {
        return $this->hasMany(Area::class);
    }
}