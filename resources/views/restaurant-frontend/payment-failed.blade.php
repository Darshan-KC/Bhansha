@extends('restaurant-frontend.layouts.main')

@section('title', 'Restaurant Management System')

@section('main-section')
    <div class="container mt-5" style="height:500px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order Failed</div>

                    <div class="card-body">
                        <p>Oops! Something went wrong with your order. Please try again later.</p>
                        <p>If the problem persists, contact our support team.</p>

                        <!-- You can add more information or links here as needed -->

                        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
