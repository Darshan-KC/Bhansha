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
                                        <h4 class="page-title text-left">File Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">File</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">File
                                                    List</a></li>

                                        </ol>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('file.index') }}" data-toggle="modal"
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
                                                                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="image"> Image Upload</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <span id="image2"
                                                                                    class="input-group-text"><i
                                                                                        class="bx bx-file"></i></span>
                                                                                <input type="file" name="image"
                                                                                    class="form-control" id="image"
                                                                                    />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('image')
                                                                                {{$message}}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="image-category"> Image Category</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">

                                                                                <input type="text" name="category"
                                                                                    class="form-control" id="image-category"
                                                                                    placeholder="Image Category" />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('category')
                                                                                {{$message}}

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
