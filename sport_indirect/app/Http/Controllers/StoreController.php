<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreLocation; 

class StoreController extends Controller
{
    /**
     * Retrieve all the store records
     */
    public function index()
    {
        $stores = StoreLocation::all(); 
        return response()->json($stores);
    }

    /**
     * Insert a new store record 
     */
    public function store(Request $request)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'storeName' => 'required|string|max:50',
                'imgPath' => 'required|string',
                'address' => 'required|string',
                'phoneNo' => 'nullable|string',
            ]);

            // Create store record
            $store = StoreLocation::create($validatedData);

            // Success response
            return response()->json([
                'message' => 'Store created successfully!',
                'store' => $store
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed - return error messages
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        
        } catch (\Exception $e) {
            // Any other unexpected errors
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the existing store record
     */
    public function update(Request $request, $id)
    {
        try {
            // Find store by ID
            $store = StoreLocation::find($id);

            // Check if store exists
            if (!$store) {
                return response()->json([
                    'message' => 'Store record not found'
                ], 404);
            }

            // Validate request data
            $validatedData = $request->validate([
                'storeName' => 'required|string|max:50',
                'imgPath' => 'required|string',
                'address' => 'required|string',
                'phoneNo' => 'nullable|string',
            ]);

            // Update store with validated data
            $store->update($validatedData);

            // Success response
            return response()->json([
                'message' => 'Store updated successfully!',
                'store' => $store
            ], 200);

        } catch (\Exception $e) {
            // Handle unexpected errors
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

     /**
      * Delete the existing store record
      */
      public function destroy($id)
    {
        try {
            // Find store by ID
            $store = StoreLocation::find($id);

            if (!$store) {
                return response()->json([
                    'message' => 'Store Record not found'
                ], 404);
            }

            // Delete store
            $store->delete();

            // Success response
            return response()->json([
                'message' => 'Store record deleted successfully!'
            ], 200);

        } catch (\Exception $e) {
            // Handle unexpected errors
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
