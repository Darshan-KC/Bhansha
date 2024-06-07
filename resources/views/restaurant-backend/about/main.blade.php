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
                                        <h4 class="page-title text-left">About Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">About</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">About
                                                    List</a></li>

                                        </ol>
                                    </div>

                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('aboutUs.create') }}" data-toggle="modal"
                                                    class="btn btn-primary btn-sm btn-flat">
                                                    <i class="fa-solid fa-plus px-1"></i>Add</a>
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
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="datatable-buttons"
                                                                class="table table-striped table-bordered dt-responsive nowrap"
                                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-priority="1">ID</th>
                                                                        <th data-priority="4">Title</th>
                                                                        <th data-priority="4">Image</th>
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        @foreach ($abouts as $about)
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $about->heading }}</td>
                                                                            @if($about->image)
                                                                                <td><img src="{{ asset('../uploads/profile/' . $about->image->name) }}"
                                                                                        alt="" width="100"></td>
                                                                            @else
                                                                                <td>Image not availabe</td>
                                                                            @endif

                                                                            <td class="text-center">
                                                                                <a href="#"
                                                                                    class="btn-sm btn btn-warning"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#fileModalView_{{ $about->id }}"><i
                                                                                        class="fa fa-eye px-1"></i>View</a>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="fileModalView_{{ $about->id }}"
                                                                                    tabindex="-1" file="dialog"
                                                                                    aria-labelledby="fileModalLabel_"
                                                                                    aria-hidden="true">
                                                                                    <div
                                                                                        class="modal-dialog  modal-dialog-centered">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="staticBackdropLabel">
                                                                                                    Description</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal"
                                                                                                    aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div
                                                                                                class="modal-body content-wrapper">
                                                                                                {{ $about->description }}
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-secondary"
                                                                                                        data-bs-dismiss="modal">Close</button>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <a href="{{ route('aboutUs.edit', $about->id) }}"
                                                                                    class="btn-sm btn btn-success"><i
                                                                                        class="fa fa-edit px-1"></i>Edit</a>

                                                                                <form
                                                                                    action="{{ route('aboutUs.destroy', $about->id) }}"
                                                                                    method="post" class="d-inline">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button
                                                                                        class="btn btn-danger btn-sm delete btn-flat"
                                                                                        onclick="return confirm('Are you sure to delete ')"><i
                                                                                            class='fa fa-trash'></i>
                                                                                        Delete</button>

                                                                                </form>
                                                                            </td>

                                                                    </tr>
                                                                    @endforeach



                                                                </tbody>
                                                            </table>


                                                        </div>
                                                        <div class="py-1 px-4">
                                                            {{ $abouts->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notify">
                                    @include('notify::components.notify')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <x-notification /> --}}
@endsection
