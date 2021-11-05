<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TowerImg extends Model
{
    use HasFactory;

    protected $table = "tower_imgs";

    public function tower(){
        return $this->hasOne( TowerImg::class, 'tower_id');
    }

    public function getMediaUrl($tower, $size){
        return TowerImg::where('tower_id', $tower)->orWhere('size', $size)->first();
    }
}
