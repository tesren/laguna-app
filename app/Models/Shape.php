<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;

    protected $table = 'shapes';

    public function unit()
    {
        return $this->hasOne( Unit::class);
    }


    public function tower()
    {
        return $this->belongsTo(Tower::class, 'tower_id');
    }

}
