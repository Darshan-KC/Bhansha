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
                                        <h4 class="page-title text-left">Product Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Product
                                                    List</a></li>

                                        </ol>
                                    </div>

                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('product.create') }}" data-toggle="modal"
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
                                                                        <th data-priority="4">Category</th>
                                                                        <th data-priority="4">Price</th>
                                                                        <th data-priority="4">Image</th>
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($products as $product)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $product->name }}</td>
                                                                            <td>{{ $product->category }}</td>
                                                                            <td>{{ $product->price }}</td>
                                                                            @if ($product->image)
                                                                                <td>
                                                                                    <img height="70px" width="70px"
                                                                                        src="{{ asset('../uploads/profile/' . $product->image->name) }}"
                                                                                        alt="" class="img-fluid">
                                                                                </td>
                                                                            @else
                                                                                <td>Images not available</td>
                                                                            @endif
                                                                            <td class="text-center">
                                                                                <a href="#"
                                                                                    class="btn-sm btn btn-primary mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#sociallinkModalEdit_{{ $product->id }}"><i
                                                                                        class="fa fa-eye px-1"></i>View</a>


                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="sociallinkModalEdit_{{ $product->id }}"
                                                                                    tabindex="-1" sociallink="dialog"
                                                                                    aria-labelledby="sociallinkModalLabel_{{ $product->id }}"
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
                                                                                            <div class="modal-body">
                                                                                                {{ $product->description }}
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-secondary"
                                                                                                            data-bs-dismiss="modal">Close</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="{{ route('product.edit', $product->id) }}"
                                                                                    class="btn-sm btn btn-success"><i
                                                                                        class="fa fa-edit px-1"></i>Edit</a>
                                                                                <form
                                                                                    action="{{ route('product.destroy', $product->id) }}"
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
                                                            {{ $products->links() }}
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
@endsection
