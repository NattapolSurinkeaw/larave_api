<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    //
    public function getProducts()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json([
                "status" => 404,
                "message" => "No products found."
            ], 404);
        }

        return response()->json([
            "status" => 200,
            "products" => $products
        ], 200);
    }

    public function getProductById($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                "status" => 200,
                "product" => $product
            ], 200);
        }
        return response()->json([
            "status" => 404,
            "message" => "product id $id not found."
        ], 404);
    }

    public function createProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "quantity" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 422,
                "errors" => $validator->messages()
            ], 422);
        }

        $product = Product::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "quantity" => $request->quantity
        ]);

        if ($product) {
            return response()->json([
                "status" => 200,
                "message" => "product created successfully."
            ], 200);
        }

        return response()->json([
            "status" => 422,
            "message" => "Something went wrong."
        ], 422);
    }
    
    public function updateProduct(Request $request, $id) 
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "Status" => 404,
                "message" => "product not found."
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            "status" => 200,
            "product" => $product
        ], 200);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "Status" => 404,
                "message" => "product not found."
            ], 404);
        }

        $product->delete();

        return response()->json([
            "status" => 200,
            "message" => "product deleted successfully."
        ], 200);
    }


}
