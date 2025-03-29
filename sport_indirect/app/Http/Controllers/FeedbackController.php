<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Retrieve all feedbacks
     */
    public function index()
    {
        $feedback = Feedback::all();
        return response()->json($feedback);
    }

    /**
     * Delete feedback
     */
    public function destroy($id)
    {
        try{
            $feedback = Feedback::find($id);

            if(!$feedback)
            {
                return response()->json([
                    'message' => "Feedback not found"
                ],404);
            }

            $feedback->delete();

            //Success response
            return response()->json([
                'message'=>"Feedback deleted successfully"
            ],200);
        }catch(\Exception $e)
        {
            return response()->json([
                'message'=>'Something went wrong',
                'error'=>$e->getMessage()
            ],500);
        }
    }

    /**
     * Create a new feedback record
     */
    public function store(Request $request)
    {
        try{
            //Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required'
            ]);

            $feedback = Feedback::create($validatedData);

            return response()->json([
                'message'=>'Feedback record created successfully',
                'feedback'=>$feedback
            ],201);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'message'=>'Validation error',
                'error'=>$e->errors()
            ],422);
        }catch(\Exception $e){
            return response()->json([
                'message'=>'Something went wrong',
                'error'=>$e->getMessage()
            ],500);
        }
    }

/**
 * Update feedback's status (Read || Unread)
 */
public function updateStatus(Request $request, $id)
{
    try {
        // Find feedback by ID
        $feedback = Feedback::find($id);

        if (!$feedback) { // ✅ Fix: Corrected syntax
            return response()->json([
                'message' => 'Feedback not found'
            ], 404);
        }

        // Validate status input (must be boolean: true or false)
        $request->validate([
            'status' => 'required|boolean'
        ]);

        // Update status
        $feedback->status = $request->status;
        $feedback->save();

        return response()->json([
            'message' => 'Feedback status updated successfully',
            'feedback' => $feedback
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
