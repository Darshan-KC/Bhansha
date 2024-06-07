<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartUpadate extends Controller
{
   public function __invoke(Request $request,$id){
    $cart = Cart::query()->findOrFail($id);
    if($request->quantity && (int)$request->quantity >0){
             $cart->update(['numbers'=>$request->quantity]);
             return response()->json(['message'=>'updated successfully'],200);
    }
    else{
        return response()->json(['message'=>'invalid quantity'],403);
    }
   }
  
      }
      

