<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_items';
    protected $primaryKey = 'cart_id';
    protected $incrementing = false;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity'
    ];

      //To automatically retrieve product details when fetching cart items
      public function product()
      {
          return $this->belongsTo(Product::class);
      }
}