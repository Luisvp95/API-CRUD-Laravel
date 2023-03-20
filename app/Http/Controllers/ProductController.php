<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response($products);
    }

        public function store(Request $request)
        {
            $client = new Client();
            
            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();
            return response()->json($product);
        }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response("se elimino correctamente");
    }    
}


