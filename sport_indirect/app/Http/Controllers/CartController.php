<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts; 

class CartController extends Controller
{
    public function index()
    {
        $stores = Carts::all(); // Retrieve all records from carts table
        return response()->json($stores);
    }
}

    /**
     * Display the list of added equipment by the specific user
     */

     /**
      * Add equipment to cart
      */
      
     /**
      * Update the added equipment
      */

      /**
       * Remove the added equipment
       */