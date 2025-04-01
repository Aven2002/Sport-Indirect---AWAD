<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        try {
            if (!$request->hasFile('image')) {
                return response()->json(['message' => 'No image uploaded'], 400);
            }
    
            $file = $request->file('image');
            
            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);
    
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'images/product/' . $filename;
            
            $file->move(public_path('images/product'), $filename);
    
            return response()->json(['imgPath' => $filePath], 200);
    
        } catch (\Exception $e) {
            return response()->json(['message' => 'Upload failed', 'error' => $e->getMessage()], 500);
        }
    }
    
}
