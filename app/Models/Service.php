<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'wash',
        'vacuum_cleaning',
        'flush',
        'engine_wash',
        'Guest_wash',
        'tire_guage',
        'engine_blow',
        'dashboard_polish',
    ];


    public function subscriptionTypes()
{
    return $this->belongsToMany(SubscriptionType::class, 'service_subscription_type');
}
}
