<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; 

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all(); // Retrieve all records from carts table
        return response()->json($cart);
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