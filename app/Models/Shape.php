<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo( Unit::class,'unit_id' );
    }


    public function tower()
    {
        return $this->belongsTo(Tower::class, 'tower_id');
    }

}
