<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressPost extends Model
{
    use HasFactory;

    protected $table = "progress_posts";

    public function images()
    {
        return $this->hasMany( ProgressImg::class);
    }

}
