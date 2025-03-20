<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ViewProducts()
    {
        $products = Product::all();

        if (!$products->isEmpty()) {
            return response()->json([
                'response' => 'Products retrieved successfully',
                'data' => $products,
                'status' => 200
            ]);
        } else {
            return response()->json([
                'response' => 'No products found',
                'data' => [],
                'status' => 404
            ]);
        }
    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id);

        if(!empty($product)){

            if(file_exists($product->image_path)){
                unlink($product->image_path);
            }
            $product->delete();

            return response()->json([
                'response' => 'Product Deleted Successfully',
                'data' => $product,
                'status' => 200
            ]);
        }else{
            return response()->json([
                'response' => 'No products found',
                'data' => [],
                'status' =>404
            ]);
        }
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image_path = 'products/'.$imageName;
        $product->save();

        if(!empty($product)){

            return response()->json([
                'response' => 'Product Added Successfully',
                'data' => $product,
                'status' => 200
            ]);
        }else{
            return response()->json([
                'response' => 'Some Thing Wrong',
                'data' => [],
                'status' =>404
            ]);
        }
    }
}
