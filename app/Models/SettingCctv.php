<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingCctv extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'setting_cctvs';

    public function setting()
    {
        return $this->belongsTo(Setting::class, 'setting_id');
    }

    public function cctv()
    {
        return $this->belongsTo(Cctv::class, 'cctv_id');
    }
}
