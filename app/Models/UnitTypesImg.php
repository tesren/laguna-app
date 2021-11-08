<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitTypesImg extends Model
{
    use HasFactory;

    protected $table = "unit_types_img";

    public function unitType()
    {
        return $this->belongsTo( UnitType::class );
    }

}
