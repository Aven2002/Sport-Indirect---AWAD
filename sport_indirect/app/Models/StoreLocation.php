<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    use HasFactory;

    protected $table = 'store_locations'; // Explicitly defining the table name

    protected $fillable = ['shop_name', 'address', 'phone_no', 'img'];
}