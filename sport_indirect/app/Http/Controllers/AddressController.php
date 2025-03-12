<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Retrieve all addresses
     */
    public function index()
    {
        $address = Address::all();
        return response()->json($address);
    }

    /**
     * Retrieve the list of the address own by the user
     */
    public function getUserAddressBook($id)
    {
        try {
            $addresses = Address::where('user_id', $id)->get();

            if ($addresses->isEmpty()) {
                return response()->json([
                    'message' => 'No addresses found for this user.'
                ], 404);
            }

            return response()->json([
                'message' => 'User addresses retrieved successfully',
                'addresses' => $addresses
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Insert a new address record
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'name' => 'required|string|max:50',
                'phoneNo' => 'required|string|max:20',
                'addressLine' => 'required|string',
                'city' => 'required|string|max:50',
                'state' => 'required|string|max:50',
                'postcode' => 'required|digits:5',
                'isDefault' => 'required|boolean'
            ]);

            $address = Address::create($validatedData);

            return response()->json([
                'message' => 'Address saved successfully',
                'address' => $address
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Update the address record
     */
    public function update(Request $request, $id)
    {
        try {
            // 查找地址记录
            $address = Address::find($id);
    
            if (!$address) {
                return response()->json([
                    'message' => 'Address record not found'
                ], 404);
            }
            
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'phoneNo' => 'required|string|max:20',
                'addressLine' => 'required|string',
                'city' => 'required|string|max:50',
                'state' => 'required|string|max:50',
                'postcode' => 'required|digits:5',
                'isDefault' => 'required|boolean'
            ]);
    
            DB::beginTransaction();
    
            $address->update($validatedData);
    
            DB::commit();
    
            return response()->json([
                'message' => 'Address updated successfully',
                'address' => $address
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
     * Delete the address record
     */
    public function destroy($id)
    {
        try{
            $address = Address::find($id);

            if(!$address){
                return response()->json([
                    'message' => 'Address record not found',
                ], 404);
            }

            $address->delete();

            //Success response
            return response()->json([
                'message' => 'Address deleted successfully',
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'message' => "Something went wrong",
                'error' => $e->getMessage()
            ] ,500);
        }
    }

}
