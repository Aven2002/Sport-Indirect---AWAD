<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Retrieve the specific user's account 
     */
    public function getProfile($id)
    {
        try{
            $profile = User::find($id);

            if(!$profile){
                return response()->json([
                    'message' => "User's account not found"
                ] ,404);
            }

            //Success response
            return response()->json([
                'message' => "User profile retrieved successfully",
                'profile' => $profile
            ], 200);

        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update user'profile
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the user profile
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'message' => "User not found"
                ], 404);
            }

            // Validate request data
            $validatedData = $request->validate([
                'username' => 'nullable|string|max:50',
                'email' => 'nullable|email|unique:users,email,' . $id,
                'dob' => 'nullable|string|max:20',
            ]);

            // Update only provided fields
            $user->update($validatedData);

            return response()->json([
                'message' => "User profile updated successfully",
                'profile' => $user
            ], 200);

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

}
