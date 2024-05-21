<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'plate_number',
        'customers_id',
        'users_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }

}
