<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Caurosel;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getByCategory(Request $request)
    {
        $category = $request->input('category');
        // Retrieve products based on the specified category
        $products = Product::where('category', $category)->with('image')->get();

        // Check if products exist for the given category
        if ($products->isEmpty()) {
            return response()->json(['status'=>false,'message' => 'No products found for the specified category.'], 404);
        }

        // Return JSON response with the products
        return response()->json(['status'=>true,'products' => $products], 200);
    }

    public function search(Request $request)
    {
        // Validate the search query
        $request->validate([
            'search' => 'required|string|min:1',
        ]);

        // Extract the search query from the request
        $query = $request->input('search');

        // Perform the search using the Product model
        $products = Product::where('name', 'like', "%$query%")->with('image')->paginate(8);
        // $carousels = Caurosel::all();
        // return view('restaurant-frontend.index', compact('products','carousels'));

        // Check if any products match the search query
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found matching the search query.'], 404);
        }

        // Return JSON response with the matching products
        return response()->json(['products' => $products], 200);
    }
}
