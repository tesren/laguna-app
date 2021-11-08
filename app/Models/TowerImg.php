<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TowerImg extends Model
{
    use HasFactory;

    protected $table = "tower_imgs";

    public function tower(){
        return $this->belongsTo( TowerImg::class, 'tower_id');
    }

}
