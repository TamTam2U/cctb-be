<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    public function area()
    {
        return $this->hasMany(Area::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}