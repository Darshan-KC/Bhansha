@extends('restaurant-frontend.layouts.main')
@section('title', 'Restaurant Management System')
@section('main-section')
    <main>

        <section class="h-100 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">

                                <h5 class="mb-0">Cart - {{ count($items) }}</h5>
                            </div>
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <img src="..." class="rounded me-2" alt="...">
                                    <strong class="me-auto">Bootstrap</strong>
                                    <small>11 mins ago</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Single item -->
                                @if (count($items) <= 0)
                                    <h5 class="mb-0">No item in the cart</h5>
                                @endif

                                <div class="row">
                                    @foreach ($items as $item)
                                        <div class="col-lg-4 col-md-11 col-sm-10 col-11 mb-4 mb-lg-0">

                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                data-mdb-ripple-color="light">
                                                <img src="{{ asset('../uploads/profile/' . $item->product->image->name) }} "
                                                    class="w-100 img-fluid cart_image" alt="Momo"  />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Image -->
                                        </div>

                                        <div class="col-lg-4 col-md-5 mb-4 mb-lg-0">
                                            <!-- Data -->
                                            <p><strong>{{ $item->product->name }}</strong></p>
                                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm me-1 mb-2"
                                                    data-mdb-toggle="tooltip" title="Remove item"
                                                    onclick="return confirm('Are you want to remove from cart?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            {{-- <button type="button" class="btn btn-danger btn-sm mb-2"
                                                data-mdb-toggle="tooltip" title="Move to the wish list">
                                                <i class="fas fa-heart"></i>
                                            </button> --}}
                                            <!-- Data -->
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 rows">
                                            <!-- Quantity -->
                                            <form id="updateCartForm" action="{{ route('cart.update', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="d-flex mb-4" style="max-width: 300px">
                                                    <button type="submit"
                                                        class="btn btn-primary px-3 me-2 updateQuantityBtn "
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <div class="form-outline">

                                                        <input id="" min="1" name="quantity"
                                                            value="{{ $item->numbers }}" type="number"
                                                            class="form-control quantityDisplay" @readonly(true) />
                                                        <label class="form-label" for="form1">Quantity</label>

                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary px-3 ms-2 updateQuantityBtn "
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                            </form>
                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->

                                        <div class="text-start text-md-center">
                                            <strong class="updateMessage">Price:
                                                ${{ $item->product->price * $item->numbers }}</strong>
                                        </div>
                                        <!-- Price -->
                                </div>
                                @endforeach
                            </div>

                            <!-- Single item -->

                            <hr class="my-4" />


                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>We accept</strong></p>
                            <img class="me-2" width="50px"
                                src="{{ asset('assets/frontend/assets/images/esewa-logo-DA36F8FD2F-seeklogo.com.png') }}"
                                alt="esewa" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total amount</strong>
                                    </div>
                                    <span><strong class="totalamount">${{ $totalAmount }}</strong></span>
                                </li>
                            </ul>



                            {{-- <form action="{{route('esewa.pay')}}" method="POST">
                                        @csrf
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Go to checkout
                                    </button>
                                </form>
                                <!-- Button trigger modal --> --}}
                            <button type="button" class="btn btn-primary check">
                                Checkout
                            </button>
                            <div class="address" style="display: none">
                                <form method="POST" action="{{ route('userupdate', auth()->user()->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address"
                                            value="{{ auth()->user()->address }}" name="address"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone"
                                            value="{{ auth()->user()->number }}" name="number"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="notify">
            @include('notify::components.notify')
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.updateQuantityBtn').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                $.ajax({
                    type: 'PUT',
                    url: form.attr('action'),
                    data: form.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        if ('total' in response) {
                            // Find the elements within the same form
                            var updateMessage = form.closest('.rows').find('.updateMessage');

                            updateMessage.text('Price: $' + response.total);
                        }
                        if ('totalprice' in response) {
                            $('.totalamount').text('$' + response.totalprice);
                        }
                    },
                    error: function(error) {
                        console.error('Error updating quantity', error);
                        // Display an error message using an alert
                        alert('Error updating quantity');
                    }
                });
            });
            // for address
            $('.check').on('click', function(e) {
                $('.address').show();
                $('.check').hide();
            });
        });
    </script>




@endsection
