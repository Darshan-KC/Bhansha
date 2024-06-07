@extends('restaurant-frontend.layouts.main')
@section('title', 'Restaurant Management System')
@section('main-section')
    <main>

        <!-- slider starts -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($carousels as $key => $carousel)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach ($carousels as $key => $carousel)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img style="object-fit: cover src="{{ asset('uploads/profile/' . $carousel->image->name) }}" class=" w-100 img-fluid carousel-image p-3" "
                            alt="...">
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- slider ends -->
        <div class="text-center m-5 fw-bold fs-2 "> {{ $site_config->popular_dish_title }}</div>
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
                        <div class="card mb-4">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{ asset('../uploads/profile/' . $product->image->name) }}"
                                    class="img-fluid border rounded responsive-image" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-title">Price:- {{ $product->price }}</h6>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="row justify-content-between">
                                            {{-- <div class="col-auto ">
                                                <input class="form-control" type="number" name="number">
                                            </div> --}}
                                            <input type="hidden" class="form-control" name="product_id"
                                            id="exampleInputText1" value="{{ $product->id }}"
                                            aria-describedby="textHelp">
                                            <div class="col-auto  "><button type="submit" class="btn btn-danger"
                                                    data-mdb-ripple-init><i class="fas fa-shopping-cart"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
            {{-- <div class=" d-flex justify-content-center m-5"><button type="submit" class="btn btn-primary">Load
                    More</button>
            </div> --}}
        </div>
        <div class="text-center m-5 fw-bold fs-2 "> {{ $site_config->special_food }}</div>
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
                        <div class="card mb-4">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{ asset('../uploads/profile/' . $product->image->name) }}"
                                    class="img-fluid border rounded responsive-image" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-title">Price:- {{ $product->price }}</h6>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="row justify-content-between">
                                            {{-- <div class="col-auto ">
                                                <input class="form-control" type="number" name="number">
                                            </div> --}}
                                            <input type="hidden" class="form-control" name="product_id"
                                            id="exampleInputText1" value="{{ $product->id }}"
                                            aria-describedby="textHelp">
                                            <div class="col-auto  "><button type="submit" class="btn btn-primary"
                                                    data-mdb-ripple-init><i class="fas fa-shopping-cart"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
            {{-- <div class=" d-flex justify-content-center m-5"><button type="submit" class="btn btn-primary">Load
                    More</button>
            </div> --}}
        </div>
    </main>
    <div class="notify">
        @include('notify::components.notify')
    </div>
@endsection
