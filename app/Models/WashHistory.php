<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subscription_id',
        'wash_date',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

}
