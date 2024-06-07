<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Caurosel;
use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function homepage()
    {
        $carousels = Caurosel::all();
        $products = Product::all();
        return view('restaurant-frontend.index', compact('products', 'carousels'));
    }

    public function menu()
    {
        $products = Product::all();
        $categories = Product::distinct()->pluck('category');
        return view('restaurant-frontend.menu', compact('products', 'categories'));
    }

    public function cart()
    {
        return view('restaurant-frontend.cart');
    }

    public function about()
    {
        return view('restaurant-frontend.about');
    }

    public function login()
    {
        return view('login-register.login');
    }

    public function register()
    {
        return view('login-register.register');
    }

    public function profile()
    {
        return view('restaurant-frontend.profile');
    }
    public function success()
    {
        return view('restaurant-frontend.payment-success');
    }
    public function fail()
    {
        return view('restaurant-frontend.payment.failed');
    }
    public function myorder()
    {
        $orders = UserProduct::with('product.image')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        return view('restaurant-frontend.orders', compact('orders'));
    }
    public function userupdate(Request $request, $id)
    {

        $data = User::find($id);
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'number' => 'required|numeric',
        ]);

        $data->address = $validatedData['address'];
        $data->number = $validatedData['number'];
        $data->update();
        return redirect()->route('esewa.pay');
    }
}
