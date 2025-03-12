<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; 

class CartController extends Controller
{
    /**
     * Retrieve all records from carts table
     */
     public function index()
    {
        $cart = Cart::all(); 
        return response()->json($cart);
    }

    /**
     * Retrieve the list of added equipment by the specific user
     */
    public function getUserCart()
    {
        // Ensure user is authenticated
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        // Find user's cart
        $cart = Cart::where('user_id', $user->id)->first();
    
        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    
        // Get cart items with product details
        $cartItems = CartItem::where('cart_id', $cart->id)
            ->with('product') 
            ->get();
    
        return response()->json([
            'cart_id' => $cart->id,
            'items' => $cartItems
        ], 200);
    }    

}

    

     /**
      * Add equipment to cart
      */
      
     /**
      * Update the added equipment
      */

      /**
       * Remove the added equipment
       */