<!-- resources/views/contact.blade.php -->

@extends('restaurant-backend.layouts.main')
@section('title', 'contact')

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
                                        <h4 class="page-title text-left">Contact</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Contact</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Contact
                                                    Create</a></li>

                                        </ol>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('contact.index') }}" data-toggle="modal"
                                                    class="btn btn-primary btn-sm btn-flat">
                                                    <i class="fa-solid fa-eye px-1"></i>View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="col-xxl">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <form action="{{ route('contact.store') }}" method="POST">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="address">Address</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span id="address"
                                                                                    class="input-group-text"><i
                                                                                        class="bx bx-user"></i></span>
                                                                                <input type="text" name="address"
                                                                                    class="form-control" id="address"
                                                                                    placeholder="Enter your address"
                                                                                    value="{{ old('address') }}" />
                                                                                <span id="address"
                                                                                    class="input-group-text">Nadipur-3,
                                                                                    Pokhara, Nepal</span>
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('address')
                                                                                    {{ $message }}
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="email">Email</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span class="input-group-text"><i
                                                                                        class="bx bx-envelope"></i></span>
                                                                                <input type="email" name="email"
                                                                                    id="email" class="form-control"
                                                                                    placeholder="Enter your email"
                                                                                    value="{{ old('email') }}" />
                                                                                <span id="email"
                                                                                    class="input-group-text">@example.com</span>
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('email')
                                                                                {{ $message }}

                                                                                @enderror



                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="phone">Phone</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span class="input-group-text"><i
                                                                                        class="bx bx-envelope"></i></span>
                                                                                <input type="tel" name="phone"
                                                                                    id="phone" class="form-control"
                                                                                    placeholder="Enter your phone"
                                                                                    value="{{ old('phone') }}" />
                                                                                <span id="phone"
                                                                                    class="input-group-text">+977986445326</span>
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('phone')
                                                                                    {{ $message }}
                                                                                @enderror


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="fax">fax</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span class="input-group-text"><i
                                                                                        class="bx bx-envelope"></i></span>
                                                                                <input type="text" name="fax"
                                                                                    id="fax" class="form-control"
                                                                                    placeholder="Enter your fax"
                                                                                    value="{{ old('fax') }}" />
                                                                                <span id="fax"
                                                                                    class="input-group-text"></span>
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('fax')
                                                                                    {{ $message }}
                                                                                @enderror


                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                    <div class="row justify-content-end">
                                                                        <div class="col-sm-10">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
