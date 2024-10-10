<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    use HasFactory;

    protected $table = 'cctvs';

    public function settingCctv()
    {
        return $this->hasMany(SettingCctv::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
