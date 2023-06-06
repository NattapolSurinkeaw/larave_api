<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function getProducts()
    {
        $products = Product::all();
        return view("pages/productlist",[
            'products' => $products
        ]);
    }

    public function createProduct()
    {
        return view("pages/createproduct");
    }

    public function editProduct($id){
        $product = Product::find($id);
        return view("pages/editproduct",[
            "product" => $product
        ]);
    }
}
