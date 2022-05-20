<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;

    protected $table = "payment_plans";

    public function towers(){
        return $this->belongsToMany(Tower::class, 'tower_payplans');
    }

}
