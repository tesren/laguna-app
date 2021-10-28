<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    use HasFactory;

    public function units()
    {
        return $this->hasMany( Unit::class, 'tower_id');
    }

    public function shapes()
    {
        return $this->hasMany( Shape::class, 'tower_id');
    }
}
