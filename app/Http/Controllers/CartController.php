<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartStoreRequest;
use App\Models\Cart;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();

        if ($user) {
            $user_id = $user->id;
            $items = Cart::with('product.image')->where('user_id', $user_id)->get();
            $productsTotal = 0;
            foreach ($items as $item) {
                $productsTotal += $item->product->price * $item->numbers;
            }

            $totalAmount = $productsTotal; // You can add shipping or other fees if needed

            return view('restaurant-frontend.cart', compact('items', 'productsTotal', 'totalAmount'));
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartStoreRequest $request)
    {
        if (!Auth::check()) {
            notify()->error('Please log in before adding a product to the cart');
            return redirect()->route('login');
        }

        $validated = $request->validated();

        $existingCartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $validated['product_id'])
            ->first();

        if ($existingCartItem) {
            notify()->error('Product is already in the cart');
            return redirect()->route('home');
        }

        try {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $validated['product_id'],
            ]);
             notify()->success('Product added to the cart successfully');
            return redirect()->route('cart.index');
        } catch (\Exception $e) {
            notify()->error('An error occurred while adding the product to the cart');
            return redirect()->route('cart.index');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'quantity' => 'integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->update(['numbers' => $request->quantity]);
        $totalPrice = $cartItem->product->price * $request->quantity;
        $user = auth()->user();

        if ($user) {
            $user_id = $user->id;
            $items = Cart::with('product.image')->where('user_id', $user_id)->get();
            $productsTotal = 0;
            foreach ($items as $item) {
                $productsTotal += $item->product->price * $item->numbers;
            }

            $totalAmount = $productsTotal;

        $redirectUrl = route('cart.index'); // Get the URL for cart.index

        return response()->json(['message' => 'Quantity updated successfully', 'total' => $totalPrice,'totalprice'=> $totalAmount, 'redirect_url' => $redirectUrl], 200);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        if (is_Null($cart)) {
            notify()->error('Item not found');
            return redirect()->route('cart.index');
        } else {
            try {
                $cart->delete();
                notify()->success('Item removed from the cart successfully');
                return redirect()->route('cart.index');
            } catch (\Exception $e) {
                notify()->error('An error occurred while removing the item from the cart');
                return redirect()->route('cart.index');
            }
        }
    }
}
