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
                                        <h4 class="page-title text-left">Orders Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Orders</a></li>
                                            <li class="breadcrumb-item active text-primary"><a href="javascript:void(0);">Orders List</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @foreach (['ordered', 'Ready for delivery', 'Delivered'] as $status)
                                @if ($orders->contains('food_status', $status))
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="cart-title">

                                                <h5>{{ $status }}</h5>
                                            </div>
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders->where('food_status', $status) as $order)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $order->product->name }}</td>
                                                            <td>{{ $order->numbers }}</td>
                                                            <td>{{ $order->price_per_item }}</td>
                                                            <td>{{ $order->phone }}</td>
                                                            <td>{{ $order->address }}</td>
                                                            <td>{{ $order->price_per_item * $order->numbers }}</td>
                                                            <td class="text-center">
                                                                <a href="#" class="btn-sm btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#sociallinkModalEdit_{{ $order->id }}">
                                                                    <i class="fa fa-edit px-1"></i>Edit
                                                                </a>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="sociallinkModalEdit_{{ $order->id }}" tabindex="-1" sociallink="dialog" aria-labelledby="sociallinkModalLabel_{{ $order->id }}" aria-hidden="true">
                                                                    <div class="modal-dialog  modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                                                    Change the Status
                                                                                </h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('order.update', $order->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('put')
                                                                                    <div class="input-group mb-3">
                                                                                        <select class="form-select" name="status" id="inputGroupSelect02">
                                                                                            <option value="Ready for delivery" {{ $order->status == 'ready_for_delivery' ? 'selected' : '' }}>Ready for delivery</option>
                                                                                            <option value="Delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit" class="btn btn-secondary">Submit</button>
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- @if ($status==="Delivered")
                                                                    
                                                                <form action="{{ route('order.destroy', $order->id) }}" method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger btn-sm delete btn-flat" onclick="return confirm('Are you sure to delete ')">
                                                                        <i class='fa fa-trash'></i> Delete
                                                                    </button>
                                                                </form>
                                                                @endif --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="notify">
                                @include('notify::components.notify')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
