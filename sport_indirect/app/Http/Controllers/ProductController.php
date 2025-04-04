<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductController extends Controller
{
    /**
     * Retrieve all the produts
     */
    public function index()
    {
        $products = Product::with('productDetail')->get();
        return response()->json($products);
    }

    /**
     * Insert a new product
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productName' => 'required|string|max:100|unique:products,productName',
            'sportCategory' => 'required|string|max:50',
            'productCategory' => 'required|string|max:50',
            'productBrand' => 'required|string|max:50',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'equipPrice' => 'required|numeric|min:0',
            'productImage' => 'required|image|mimes:jpg,png,jpeg|max:2048' // Validate image file
        ]);

        // Handle Image Upload
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = $request->productName . '.' . $image->getClientOriginalExtension(); // Use productName as filename
            $image->move(public_path('images/Products'), $imageName); // Save directly to public folder
            $imagePath = 'Products/' . $imageName; // Store relative path
        } else {
            return response()->json(['error' => 'Product image is required.'], 400);
        }        

        try {
            DB::beginTransaction(); // Start Transaction

            // Step 1: Insert into products table
            $product = Product::create([
                'productName' => $validatedData['productName'],
                'sportCategory' => $validatedData['sportCategory'],
                'productCategory' => $validatedData['productCategory'],
                'productBrand' => $validatedData['productBrand'],
            ]);

            // Step 2: Insert into product_details table
            ProductDetail::create([
                'product_id' => $product->id,
                'description' => $validatedData['description'],
                'stock' => $validatedData['stock'],
                'imgPath' => $imagePath, // Use the uploaded image path
                'equipPrice' => $validatedData['equipPrice'],
            ]);

            DB::commit(); // Commit Transaction

            return response()->json([
                'message' => 'Product created successfully!',
                'product' => $product
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback Transaction if error occurs
            return response()->json([
                'message' => 'Failed to create product',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specific product's information
     */
    public function update(Request $request, $id)
    {
        try{
            //Find product by ID
            $product = Product::find($id);

            if(!$product){
                return response()->json([
                    'message'=>'Product record not found'
                ],404);
            }

            // Find related product details
            $productDetails = ProductDetail::where('product_id', $id)->first();
            if (!$productDetails) {
                return response()->json(['message' => 'Product details not found'], 404);
            }

            //Validate request data
            $validatedData = $request->validate([
                'productName' => 'required|string|max:100|unique:products,productName,' . $id, // Allow same name for this ID'
                'productCategory' => 'required|string|max:50',
                'productBrand' => 'required|string|max:50',
                'description' => 'required|string',
                'stock' => 'required|integer|min:0',
                'imgPath' => 'required|string',
                'equipPrice' => 'required|numeric|min:0',
            ]);

            DB::beginTransaction(); 

            //Update product with validated data
            $product->update([
                'productName' => $validatedData['productName'],
                'productCategory' => $validatedData['productCategory'],
                'productBrand' => $validatedData['productBrand'],
            ]);

            // Update `Product_details` table
            $productDetails->update([
                'description' => $validatedData['description'],
                'stock' => $validatedData['stock'],
                'imgPath' => $validatedData['imgPath'],
                'equipPrice' => $validatedData['equipPrice'],
            ]);

            DB::commit();

            //Success response
            return response()->json([
                'message'=>'Product record updated successfully',
                'Product'=>$product
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'message'=>'Something went wrong!',
                'error'=>$e->getMessage()
            ],500);
        }
    }


     /**
      * Delete the specific existing product
      */
      public function destroy($id)
    {
        try{
            //Find product by ID
            $product = Product::find($id);

            if(!$product){
                return response()->json(['message'=>'Product Record not found'],404);
            }

            //Delete a product
            $product->delete();

            //Success Response
            return response()->json(['message'=>'Product record deleted successfully'],200);
        }
      catch(Exception $e){
        return response()->json([
            'message'=>'Something went wrong!',
            'error'=>$e->getMessage()],500);
      }
    }

    /**
     * Retrieve specific product's info
     */
    public function getProduct($id)
    {
        try{
            $product = Product::with('productDetail')->find($id);

            if(!$product)
            {
                return response()->json([
                    'message'=>'Product not found'
                ],404);
            }

            return response()->json([
                'message'=>'Product retrieve successfully',
                'product'=>$product
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





    