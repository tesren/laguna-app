<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressImg extends Model
{
    use HasFactory;

    protected $table = "progress_imgs";

    public function post()
    {
        return $this->belongsTo( ProgressPost::class, 'progress_post_id');
    }

}
