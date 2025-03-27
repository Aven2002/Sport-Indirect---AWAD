<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'productName',
        'sportCategory',
        'productCategory',
        'productBrand',
        'created_at',
        'updated_at'
    ];

    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class, 'product_id');
    }
}