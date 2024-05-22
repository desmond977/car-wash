<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'users_id',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'customers_id', 'id');
    }

    public function sub(): HasMany
    {
        return $this->hasMany(Subscription::class, 'customers_id', 'id');
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, 'customers_id', 'id');
    }
}
