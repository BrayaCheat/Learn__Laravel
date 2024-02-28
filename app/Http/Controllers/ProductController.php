<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProduct()
    {
        $product = Product::all();
        return response()->json($product, 200);
    }

    public function getProductById($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['Message: ' => 'Product not found!'], 404);
        } else {
            return response()->json($product);
        }
    }

    public function getProductByType($type)
    {
        $product = Product::where('type', $type) -> get();
        if (!$product) {
            return response()->json(['Message: ' => 'Product not found'], 404);
        } else {
            return response()->json($product);
        }
    }

    public function addProduct(Product $product)
    {
        $product = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        Product::create($product);

        return response()->json('Product Created!', 200);
    }

    public function updateProduct(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $product = Product::findOrFail($id);
        if ($product) {
            $product->update($validateData);

            return response()->json(['Message: ' => 'Product Updated!'], 300);
        } else {
            return response()->json(['Message: ' => 'Product not found'], 404);
        }
    }
}
