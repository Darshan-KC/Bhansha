@extends('restaurant-frontend.layouts.main')
@section('title', 'Restaurant Management System')
@section('main-section')

    <main>
        <section>
            <div class="text-center p-5 bg-dark text-white">
                <h1>{{ config('app.name') }} Menu</h1>
                <h5>Menu for you!!</h5>
            </div>
        </section>
        <section class="container p-4 pb-0">
            <div class="mb-3">
                <label for="select" class="form-label">Order Menu by Category:</label>
                <select id="category" class="form-select form-select-lg  w-25 fs-6" name="" id="">
                    <option value="" selected>Default</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
        </section>

        <div>
            <section class="container">
                <div class="row" id="main">
                    @foreach ($categories as $category)

                        <div class="  fw-bold fs-3 text-dark mb-2  text-center p-3">{{ $category }}</div>

                        @foreach ($products as $product)
                            @if ($product->category == $category)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
                                    <div class="card mb-4">
                                        <div class="bg-image hover-overlay" data-mdb-ripple-init
                                            data-mdb-ripple-color="light">
                                            <img src="{{ asset('../uploads/profile/' . $product->image->name) }}"
                                                class="img-fluid border rounded responsive-image" style="object-fit:cover" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                                </div>
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
                                                        <div class="col-auto"><button type="submit" class="btn btn-primary"
                                                                data-mdb-ripple-init><i
                                                                    class="fas fa-shopping-cart"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            @endif
                        @endforeach
                        {{-- <div class=" d-flex justify-content-center m-5"><button type="submit" class="btn btn-primary">Load
                                More</button>
                        </div> --}}
                    @endforeach
            </section>
        </div>
    </main>
@endsection
@push('footer-script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        jQuery(document).ready(function($) {

            // Add event listener to the select element
            $('#category').change(function() {
                // Get the selected option value
                var selectedCategory = $(this).val();
                console.log(selectedCategory);
                if (selectedCategory != "") {
                    // Make an AJAX request to fetch data from the 'category' route
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('category') }}',
                        data: {
                            category: selectedCategory
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Populate the data into the section element
                            $('#main').html(response);
                            console.table(response);

                            $('#main').empty();

                            response.products.forEach(function(product) {
                                console.log('Bhitra ayao');
                                console.log(product); //lsjdfldsj
                                console.log(product['image']['name']);
                                var cardColumn = $(
                                    '<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">'
                                );
                                var card = $('<div class="card mb-4">');
                                var bgImage = $(
                                    '<div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">'
                                );
                                var imageSrc = '../uploads/profile/' + product['image'][
                                    'name'
                                ];
                                var image = '<img src="' + imageSrc +
                                    '" class="img-fluid border rounded responsive-image" />';
                                $('#imagesContainer').append(image);
                                var mask = $(
                                    '<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>'
                                );
                                var cardBody = $('<div class="card-body">');
                                var productName = $('<h5 class="card-title">' + product
                                    .name + '</h5>');
                                var productPrice = $('<h6 class="card-title">Price: ' +
                                    product.price + '</h6>');
                                var form = $(
                                    '<form action="{{ route('cart.store') }}" method="POST">@csrf<div class="d-flex"><div class="row justify-content-between"><div class="col-auto "><input type="hidden" class="form-control" name="product_id" value="' +
                                    product.id +
                                    '" aria-describedby="textHelp"></div><div class="col-auto row "><button type="submit" class="btn btn-danger" data-mdb-ripple-init><i class="fas fa-shopping-cart"></i></button></div></div></div></form>'
                                );
                                card.append(bgImage);
                                bgImage.append(image);
                                bgImage.append(mask);
                                card.append(cardBody);
                                cardBody.append(productName);
                                cardBody.append(productPrice);
                                cardBody.append(form);
                                cardColumn.append(card);
                                $('#main').append(cardColumn);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }else{
                    location.reload(true);
                }
            });
            // Add event listener to the select element
            $('#search').on("keydown", function() {
                if ($(this).val() != "") {
                    let name = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('product.search') }}",
                        data: {
                            search: name // Send the search term as 'name'
                        },
                        dataType: "json",
                        success: function(response) {
                            renderResults(response['products']['data']);

                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(xhr.responseText);
                        }
                    });
                }
            });

            // search input
            $('#searchform').on('submit', function(e) {
                e.preventDefault();
                let search = $('#search').val();
                $.ajax({
                    url: '{{ route('product.search') }}', // Replace this with your actual endpoint
                    type: 'POST',
                    data: {
                        search: search
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Handle the successful response, for example, display the search results
                        $('#searchRslt').hide();
                        let products = response['products']['data'];
                        let card = "";
                        let image = "";
                        products.forEach(function(product) {
                            image = `../uploads/profile/` + product['image']['name'];
                            card += `<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
                                    <div class="card mb-4">
                                        <div class="bg-image hover-overlay" data-mdb-ripple-init
                                            data-mdb-ripple-color="light">
                                            <img src="${image}"
                                                class="img-fluid border rounded responsive-image" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">` + product['name'] + `</h5>
                                            <h6 class="card-title">Price:- RS ` + product['price'] + `</h6>
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <div class="d-flex">
                                                    <div class="row justify-content-between">
                                                        <input type="hidden" class="form-control" name="product_id"
                                                            id="exampleInputText1" value="{{ $product->id }}"
                                                            aria-describedby="textHelp">
                                                        <div class="col-auto"><button type="submit" class="btn btn-primary"
                                                                data-mdb-ripple-init><i
                                                                    class="fas fa-shopping-cart"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>`;
                        });
                        $("#main").empty();
                        $('#main').html(card);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                    }
                });
            });

            function renderResults(results) {
                var searchResultsDropdown = $('#searchResults');

                if (results.length > 0) {
                    var resultList = '<ul class="list-group" id = "searchRslt">';
                    results.forEach(function(result) {
                        resultList += '<li class="list-group-item">' + result['name'] + '</li>';
                    });
                    resultList += '</ul>';
                    searchResultsDropdown.html(resultList);
                    searchResultsDropdown.show();
                } else {
                    searchResultsDropdown.html('<p class="dropdown-item">No results found</p>');
                    searchResultsDropdown.show();
                }
            }

            $('#searchRslt li').on('click', function() {
                console.log('click bhayo.s')
                // Get the text value of the clicked list item
                let clickedValue = $(this).text();

                // Set the value of the search input to the clicked value
                $('#search').val(clickedValue);

                // Hide the search results
                $('#searchRslt').hide();
            });
        });
    </script>
@endpush
