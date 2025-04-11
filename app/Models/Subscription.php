<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'plan_id' , 'user_id' , 'current_period_end' , 'current_period_start' , 'stripe_plan_id' ,
        'stripe_status' , 'stripe_subscription_id'
    ];
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
