<!-- resources/views/contact.blade.php -->

@extends('restaurant-backend.layouts.main')
@section('title', 'table-create')

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
                                        <h4 class="page-title text-left">User</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Book Table</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Table
                                                    Create</a></li>

                                        </ol>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('booktable.index') }}" data-toggle="modal"
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
                                                                <form action="{{ route('booktable.store') }}" method="POST">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="table-name">table-name</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span id="table-name"
                                                                                    class="input-group-text"></span>
                                                                                <input type="text" name="tablename"
                                                                                    class="form-control" id="table-name"
                                                                                    placeholder="Enter your table-name"
                                                                                    value="" />

                                                                            </div>

                                                                            <div class="text-danger m-2">
                                                                                @error('table-name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="table-price">table-price</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span id="table-price"
                                                                                    class="input-group-text"></span>
                                                                                <input type="number" name="tableprice"
                                                                                    class="form-control" id="table-price"
                                                                                    placeholder="Enter your table-price"
                                                                                    value="" />

                                                                            </div>

                                                                            <div class="text-danger m-2">
                                                                                @error('table-price')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="description">description</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span id="description"
                                                                                    class="input-group-text"></span>
                                                                                <textarea name="description" class="form-control" id="description" placeholder="Enter your description" value="" rows="4"></textarea>

                                                                            </div>

                                                                            <div class="text-danger m-2">
                                                                                @error('description')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="category">category</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span id="category"
                                                                                    class="input-group-text"></span>
                                                                                <input type="text" name="category"
                                                                                    class="form-control" id="category"
                                                                                    placeholder="Enter your category"
                                                                                    value="" />

                                                                            </div>

                                                                            <div class="text-danger m-2">
                                                                                @error('category')
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
