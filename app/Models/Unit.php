<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;


    public function unitType()
    {
        return $this->belongsTo(UnitType::class, 'type_id');
    }

    public function tower()
    {
        return $this->belongsTo( Shape::class, 'tower_id' );
    }

    public function shape()
    {
        return $this->belongsTo( Shape::class, 'unit_id' );
    }


}
