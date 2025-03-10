<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreLocation; 

class StoreController extends Controller
{
    public function index()
    {
        $stores = StoreLocation::all(); // Retrieve all records from store_location table
        return response()->json($stores);
    }
}
