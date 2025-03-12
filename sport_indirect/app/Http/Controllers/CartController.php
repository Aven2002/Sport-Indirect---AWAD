<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function getUserCart($user_id)
    {
        try {
            // Find user's cart
            $cart = Cart::where('user_id', $user_id)->first();

            if (!$cart) {
                return response()->json([
                    'message' => "User's cart not found"
                ], 404);
            }

            // Get cart items with product details
            $cartItems = CartItem::where('cart_id', $cart->id)
                ->with('product') 
                ->get();

            return response()->json([
                'cart_id' => $cart->id,
                'items' => $cartItems
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went wrong",
                'error' => $e->getMessage()
            ], 500);
        }
    }  

    /**
     * Insert new equipment to cart
     */
    public function addToCart(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'product_id' => 'required|integer',
                'quantity' => 'required|integer|min:1'
            ]);

            DB::beginTransaction();

            // Step 1: Find or create cart
            $cart = Cart::firstOrCreate(['user_id' => $validatedData['user_id']]);

            // Step 2: Check if product already exists in cart
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $validatedData['product_id'])
                ->first();

            if ($cartItem) {
                // If item exists, update quantity
                $cartItem->increment('quantity', $validatedData['quantity']);
            } else {
                // Otherwise, create a new cart item
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $validatedData['product_id'],
                    'quantity' => $validatedData['quantity']
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Product added to cart successfully',
                'cart' => $cart->load('cartItems')
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update equipment quantity
     */
    public function update(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'product_id' => 'required|integer',
                'quantity' => 'required|integer|min:1'
            ]);

            DB::beginTransaction();

            // Find user's cart
            $cart = Cart::where('user_id', $validatedData['user_id'])->first();

            if (!$cart) {
                return response()->json([
                    'message' => 'Cart not found'
                ], 404);
            }

            // Find the cart item
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $validatedData['product_id'])
                ->first();

            if (!$cartItem) {
                return response()->json([
                    'message' => 'Product not found in cart'
                ], 404);
            }

            // Update the quantity
            $cartItem->update([
                'quantity' => $validatedData['quantity']
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Cart updated successfully',
                'cartItem' => $cartItem
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete equipment from cart
     */
    public function destroy(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'product_id' => 'required|integer'
            ]);

            DB::beginTransaction();

            // Step 1: Find the user's cart
            $cart = Cart::where('user_id', $validatedData['user_id'])->first();

            if (!$cart) {
                return response()->json([
                    'message' => 'Cart not found'
                ], 404);
            }

            // Step 2: Find the cart item
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $validatedData['product_id'])
                ->first();

            if (!$cartItem) {
                return response()->json([
                    'message' => 'Product not found in cart'
                ], 404);
            }

            // Step 3: Delete the cart item
            $cartItem->delete();

            // Step 4: Check if the cart is empty and delete the cart if needed
            if (CartItem::where('cart_id', $cart->id)->count() == 0) {
                $cart->delete();
            }

            DB::commit();

            return response()->json([
                'message' => 'Item removed from cart successfully'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}

      
     /**
      * Update the added equipment
      */
