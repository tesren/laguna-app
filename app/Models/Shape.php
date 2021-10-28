<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->hasOne( Unit::class,'unit_id' );
    }


    public function tower()
    {
        return $this->hasOne(Tower::class, 'tower_id');
    }

}
