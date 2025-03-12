<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts'; 

    //To automatically retrieve product details when fetching cart items
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}