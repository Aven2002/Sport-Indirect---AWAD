<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }
}
    /**
     * Display all the history orders
     */

    /**
     * Display the specific order
     */

    /**
     * Create a new order
     */

    /**
     * Update the specific order's information
     */

    /**
     * Delete the specific existing order
     */
