<?php

namespace App\Http\Controllers;

use App\Mail\ProductMail;
use App\Models\address;
use App\Models\Cart;
use App\Models\payment;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Xentixar\EsewaSdk;
use Xentixar\EsewaSdk\Esewa;

class EsewaPaymentController extends Controller
{
    public function pay(Request $request){
        $carts = Cart::query()->where('user_id',Auth::id())->get();
        $sum = 0;
        foreach($carts as $cart){
            $sum += $cart->numbers * $cart->product->price;
        }
        if($sum > 0){
            $esewa = new Esewa();
            $esewa->config(route('esewa.check'),route('esewa.check'), $sum);
            $esewa->init();

        }
    }
    public function check(Request $request){
        $esewa = new Esewa();
        $data = $esewa->decode();
        if($data){
            if($data["status"] === 'COMPLETE'){
                $carts = Cart::with('product')->where('user_id',Auth::id())->get();

                $msg = 'payment successful';
                foreach($carts as $cart){
                    UserProduct::query()->create([
                        'user_id' => Auth::id(),
                        'product_id' => $cart->product_id,
                        'numbers' => $cart->numbers,
                        'esewa_status' => 'payed',
                        'address' => auth()->user()->address,
                        'phone' => auth()->user()->number,
                        'price_per_item' => $cart->product->price,
                        'total_amount' => $data['total_amount'],
                        'food_status' => 'ordered'

                    ]);
                    payment::query()->create([
                       'user_id' => Auth::id(),
                       'transaction_code' => $data['transaction_code'],
                       'amount' => $cart->product->price,
                       'quantity' => $cart->numbers,
                       'product_id' => $cart->product_id,

                    ]);
                    $cart->delete();


                }
                $transaction_code = $data['transaction_code'];
                $items = payment::query()->with('user','product.image')->where('transaction_code',$transaction_code)->paginate(15);

                    $datas = payment::query()->with('user','product')->where('transaction_code',$transaction_code)->first();
                    $productsTotal = 0;
                    foreach ($items as $item) {
                        $productsTotal += $item->amount * $item->quantity;
                    }
                    $user = User::where('id',auth()->user()->id)->first();
                    $totalAmount = $productsTotal;
                    $products = UserProduct::where('user_id',$user->id)->get();
                    Mail::to($user->email)->send(new ProductMail($user,$products));
                return view('restaurant-frontend.payment-success',compact('items','totalAmount','datas','transaction_code'));
            }

        }
        return view('restaurant-frontend.payment-failed');
    }
}
