@extends('restaurant-backend.layouts.main')
@section('title', 'Restaurant Management System')
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
                                        <h4 class="page-title text-left">Product Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Product
                                                    Edit</a></li>

                                        </ol>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('product.index') }}" data-toggle="modal"
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
                                                                <form action="{{ route('product.update', $product->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="image-category">Title</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">

                                                                                <input type="text" name="title"
                                                                                    class="form-control" id="title"
                                                                                    value="{{ $product->name  }}" />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('title')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="image-category">Price:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">

                                                                                <input type="text" name="price"
                                                                                    class="form-control" id="title"
                                                                                    value="{{ $product->price }}" />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('price')
                                                                                {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="image-category">Category:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">

                                                                                <input type="text" name="category"
                                                                                    class="form-control" id="category"
                                                                                    value="{{ $product->category }}" />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('name')
                                                                                {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="image"> Image Upload</label>
                                                                        <div class="col-sm-10">
                                                                            @include('components.model')

                                                                            <div class="text-danger m-2">
                                                                                @error('image_id')
                                                                                {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="image-category">Description:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <textarea name="description" class="form-control" id="" cols="30" rows="3">{{ $product->description }}</textarea>
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('description')
                                                                                {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-sm-10 mb-3">
                                                                            <button type="submit" class="btn btn-primary"
                                                                                name="submit">Submit</button>
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
