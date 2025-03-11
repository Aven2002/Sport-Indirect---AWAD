<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    use HasFactory;

    protected $table = 'store_locations'; 

    protected $fillable = ['storeName', 'imgPath', 'address', 'phoneNo'];
}

