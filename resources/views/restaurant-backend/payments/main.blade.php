@extends('restaurant-backend.layouts.main')
@section('title', 'Restaurant Management System ')
@section('main-section')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mb-4 order-0">
                            <div class="col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h4 class="page-title text-left">Payment Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Payment</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Payment
                                                    List</a></li>

                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="datatable-buttons"
                                                                class="table table-striped table-bordered dt-responsive nowrap"
                                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-priority="1">ID</th>
                                                                        <th data-priority="4">Product</th>
                                                                        <th data-priority="4">Quantity</th>
                                                                        <th data-priority="4">Price</th>
                                                                        <th data-priority="4">Total</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($payments as $payment)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $payment->product->name }}</td>
                                                                            <td>{{ $payment->quantity }}</td>
                                                                            <td>{{ $payment->product->price }}</td>
                                                                            <td>{{ $payment->product->price * $payment->quantity }}</td>
                                                                           
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <h3 class="float-end">Total Sell: ${{$productsTotal}}</h3>
                                                        <div class="py-1 px-4">
                                                            {{ $payments->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notify">
                                    @include('notify::components.notify')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
