<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today(); // Get the current date

        $orders = UserProduct::with('user', 'product.image')
            ->whereDate('created_at', $today)
            ->paginate(10);
        
        return view('restaurant-backend.orders.main', compact('orders'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProduct $userProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProduct $userProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $data = UserProduct::find($id);
      $data->food_status = $request->status;
      $data->update();
      notify()->success('Status is updated successfully.');
      return redirect()->route('order.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProduct $userProduct)
    {
        //
    }
}
