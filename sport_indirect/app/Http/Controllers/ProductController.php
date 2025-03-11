<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }
}


/**
     * Display all the products
     */
    
     /**
      * Display the specific product
      */

      /**
       * Create a new product
       */

       /**
        * Update the specific product's information
        */

        /**
         * Delete the specific existing product
         */