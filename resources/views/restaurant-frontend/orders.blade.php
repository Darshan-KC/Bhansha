@extends('restaurant-frontend.layouts.main')

@section('title', 'My Orders')

@section('main-section')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>My Orders</h3>
                    </div>

                    <div class="card-body">
                        @if(count($orders) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.N</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $order->product->name }}</td>
                                                <td>
                                                    <img width="100px" height="100px" src="{{  asset('../uploads/profile/' . $order->product->image->name) }} " alt="">
                                                </td>
                                                <td>{{ $order->numbers }}</td>
                                                <td>${{ $order->price_per_item }}</td>
                                                <td>${{ $order->price_per_item * $order->numbers }}</td>
                                                <td>{{ $order->food_status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <p class="text-muted">You haven't placed any orders yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    @endsection
