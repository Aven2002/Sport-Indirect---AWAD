<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'address_id',
        'totalPrice',
        'status',
        'paymentMethod'
    ];

    // Define the relationship
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}