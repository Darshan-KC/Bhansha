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
                                        <h4 class="page-title text-left">Site Config Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Site Configuration</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Site Configuration Lists</a></li>

                                        </ol>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('site.edit', $siteConfigs->id) }}" data-toggle="modal"
                                                    class="btn btn-primary btn-sm btn-flat">
                                                    <i class="fa-solid fa-eye px-1"></i>Edit</a>
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
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label "
                                                                        for="site">Site-Logo-Title</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="text" class="form-control"
                                                                                id="site"
                                                                                placeholder="Enter a site logo title"
                                                                                value="{{ $siteConfigs->logo_title }}"
                                                                                disabled />
                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label"
                                                                        for="image">Logo Upload</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">
                                                                            @if ($siteConfigs->image)
                                                                                <img src="{{ asset('../uploads/profile/' .$siteConfigs->image->name) }}"
                                                                                    alt="Logo" class="img-fluid">
                                                                            @else
                                                                                <p>No image uploaded</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label "
                                                                        for="company_name">Company Name</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="text" class="form-control"
                                                                                id="company_name"
                                                                                placeholder="Enter a company name"
                                                                                value="{{ $siteConfigs->company_name }}"
                                                                                disabled />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label "
                                                                        for="popular-dish-table">Popular-dish-title</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">

                                                                            <input type="text" class="form-control"
                                                                                id="popular-dish_title"
                                                                                placeholder="Enter a popular dish title"
                                                                                value="{{ $siteConfigs->popular_dish_title }}"
                                                                                disabled />
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label "
                                                                        for="special_food">Special-Food-Title</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">

                                                                            <input type="text" class="form-control"
                                                                                id="special_food"
                                                                                placeholder="Enter a popular dish title"
                                                                                value="{{ $siteConfigs->special_food }}"
                                                                                disabled />
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label "
                                                                        for="social-headline">Social Headline</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">

                                                                            <input type="text" class="form-control"
                                                                                id="social-headline"
                                                                                placeholder="Enter a Social Headline"
                                                                                value="{{ $siteConfigs->social_headline }}"
                                                                                disabled />
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label "
                                                                        for="">Description</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">

                                                                            <textarea id="" cols="100" rows="5" class="form-control" placeholder="Enter a description" disabled>{{ $siteConfigs->description }}</textarea>
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
            </div>
        </div>
    </div>

@endsection
