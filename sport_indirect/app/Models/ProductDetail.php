<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    protected $primaryKey = 'product_id'; 
    public $incrementing = false; 
    public $timestamps = false; // Disable automatic timestamps

    protected $fillable = [ 
        'product_id',
        'description',
        'stock',
        'imgPath',
        'equipPrice',
    ];
}