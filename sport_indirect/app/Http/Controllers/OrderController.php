<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Retrieve all the history orders
     */

    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

     /**
     * Retrieve the list of orders own by the specific user
     */
    public function getUserOrders($id)
    {
        try {
            $orders = DB::table('orders')
                ->where('user_id', $id)
                ->get();

            if ($orders->isEmpty()) {
                return response()->json([
                    'message' => 'No orders found for this user.'
                ], 404);
            }

            return response()->json([
                'message' => 'Orders retrieved successfully',
                'orders' => $orders
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create a new order record
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'=>'required|integer',
            'address_id'=>'required|integer',
            'totalPrice'=>'required|numeric|min:0',
            'product_id'=>'required|integer',
            'quantity'=>'required|integer|min:0',
            'subPrice'=>'required|numeric|min:0'
        ]);

        try{
            DB::beginTransaction();

            //Step 1: Insert into orders table
            $order = Order::create([
                'user_id'=>$validatedData['user_id'],
                'address_id'=>$validatedData['address_id'],
                'totalPrice'=>$validatedData['totalPrice']
            ]);

            //Step 2: Insert into order_details table
            OrderDetail::create([
                'order_id'=>$order->id,
                'product_id'=>$validatedData['product_id'],
                'quantity'=>$validatedData['quantity'],
                'subPrice'=>$validatedData['subPrice']
            ]);

            DB::commit();

            return response()->json([
                'message'=>'Order created successfully',
                'order'=>$order
            ],201);
        }catch(\Exception $e)
        {
            DB::rollback();
            return response()->json([
                'message'=>'Failed to create order',
                'error'=>$e->getMessage()
            ],500);
        }
    }

     /**
     * Update the specific order's information
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the order
            $order = Order::find($id);
            if (!$order) {  
                return response()->json([
                    'message' => 'Order record not found'
                ], 404);
            }
    
            // Validate request data
            $validatedData = $request->validate([
                'status' => 'required|string'
            ]);
    
            DB::beginTransaction();
    
            // Update order information with validated data
            $order->update([
                'status' => $validatedData['status'],
            ]); 
    
            DB::commit(); 
    
            return response()->json([
                'message' => 'Order updated successfully',
                'order' => $order
            ], 200);
        } catch (\Exception $e) {
            DB::rollback(); // ✅ 遇到错误回滚
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete the specific order history
     */
    public function destroy($id)
    {
        try{
            //Find the order history
            $order = Order::find($id);

            if(!$order){
                return response()->json([
                    'message'=>'Order Record not found'
                ],404);
            }

            $order->delete();

            //Success response
            return response()->json([
                'message'=>'Order record deleted successfully'
            ],200);
        }catch(\Exception $e)
        {
            return response()->json([
                'message'=>'Something went wrong',
                'error'=>$e->getMessage()
            ],500);
        }
    }


}
   
   
