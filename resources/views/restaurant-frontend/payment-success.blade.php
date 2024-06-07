@extends('restaurant-frontend.layouts.main')
@section('title', 'Restaurant Management System')
@section('main-section')
<section style="min-height:100vh" >

    <div class="container" >
        <div class="text-center">

            <h2 class="p-4">Thank You for your Order.</h2>
        </div>
        <h4>Order By: {{$datas->user->name}}</h4>
        <table class="table  table-bordered table-sm table-responsive-sm">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $data)   
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->product->name}}</td>
                    <td>${{$data->amount}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>${{$data->quantity * $data->amount}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
         <h4>Total Amount:${{$totalAmount}}</h4>
        </div>
        <div>
        
            <h5>Please download the Payment Details if you need, Before Exit</h5>
            <a href="{{route('download',$transaction_code)}}" class="btn btn-primary">Download</a>
        </div>
    </div>
    
    
</section>

    
@endsection