<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'number_cars_allowed',
        'duration',
    ];

     // Define relationships
     public function subscription()
     {
         return $this->hasMany(Subscription::class, 'subscriptionType_id');
     }

     // Helper methods
     public function formattedPrice()
     {
         return '$' . number_format($this->price, 2);
     }

     public function formattedDuration()
     {
         return $this->duration . ' days';
     }

     public static $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'number_cars_allowed' => 'required|integer|min:1',
        'duration' => 'required|integer|min:1', // duration in days
    ];

}
