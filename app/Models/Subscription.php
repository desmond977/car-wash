<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_types_id',
        'customers_id',
        'number_of_wash',
        'start_date',
        'end_date',
    ];

    public function subscriptionType()
    {
        return $this->belongsTo(SubscriptionType::class, 'subscriptionTypes_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }

    public function washHistories()
    {
        return $this->hasMany(WashHistory::class);
    }

    public function remainingWashes()
    {
        $usedWashes = $this->washHistories()->count();
        return max(0, $this->number_of_wash - $usedWashes);
    }

//Validation Rules:
public static $rules = [
    'subscriptiontypes_id' => 'required|exists:subscription_types,id',
    'customers_id' => 'required|exists:customers,id',
    'number_of_wash' => 'required|integer|min:0',
    'start_date' => 'required|date',
    'end_date' => 'required|date|after_or_equal:start_date',
];

}