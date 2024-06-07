<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        $payments = payment::with('user', 'product.image')
            ->whereDate('created_at', $today)
            ->paginate(10);
            $productsTotal = 0;
            foreach ($payments as $item) {
                $productsTotal += $item->amount * $item->quantity;
            }

            $totalAmount = $productsTotal;
        return view('restaurant-backend.payments.main',compact('payments','productsTotal'));
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
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment $payment)
    {
        //
    }
    public function downloadPDF($transaction_code)
{ 
    $items = payment::query()->with('user','product.image')->where('transaction_code', $transaction_code)->get();


        $datas = payment::query()->with('user','product')->where('transaction_code',$transaction_code)->first();
        $productsTotal = 0;
        foreach ($items as $item) {
            $productsTotal += $item->amount * $item->quantity;
        }

        $totalAmount = $productsTotal;
    $pdf = PDF::loadView('restaurant-frontend.pdf.orderbill', compact('items','totalAmount','datas')) ->setOptions(['isHtml5ParserEnabled' => true]);;
    return $pdf->download('payment.pdf');
}
}
