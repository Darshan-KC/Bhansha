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
                                                <a href="{{ route('file.create') }}" data-toggle="modal"
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
                                                                        <th data-priority="4">Category</th>
                                                                        <th data-priority="4">Image</th>
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($images as $image)
                                                                        <tr>

                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $image->category }}</td>
                                                                            <td><img src="{{ asset('../uploads/profile/' . $image->name) }}" alt="images" srcset="" width="100" class="img-fluid"></td>

                                                                            <td class="text-center">
                                                                                {{-- edit model button --}}
                                                                                <a href="{{ route('file.edit', $image->id) }}"
                                                                                    class="btn-sm btn btn-success"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#fileModalEdit_{{ $image->id }}"><i
                                                                                        class="fa fa-edit px-1"></i>Edit</a>


                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="fileModalEdit_{{ $image->id }}"
                                                                                    tabindex="-1" file="dialog"
                                                                                    aria-labelledby="fileModalLabel_{{ $image->id }}"
                                                                                    aria-hidden="true">
                                                                                    <div
                                                                                        class="modal-dialog  modal-dialog-centered">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="staticBackdropLabel">
                                                                                                    Edit Image</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal"
                                                                                                    aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <form action="{{ route('file.update', $image->id) }}"
                                                                                                    method="POST" enctype="multipart/form-data">
                                                                                                    @csrf
                                                                                                    @method('put')
                                                                                                    <div class="input-group input-group-merge d-flex justify-content-between">
                                                                                                        <div class="row mb-3">
                                                                                                            <label
                                                                                                                class="col-sm-2 col-form-label"
                                                                                                                for="image">
                                                                                                                Image
                                                                                                                Upload</label>
                                                                                                            <div
                                                                                                                class="col-sm-10">
                                                                                                                <div
                                                                                                                    class="input-group input-group-merge">
                                                                                                                    <span
                                                                                                                        id="image2"
                                                                                                                        class="input-group-text"><i
                                                                                                                            class="bx bx-file"></i></span>
                                                                                                                    <input
                                                                                                                        type="file"
                                                                                                                        name="image"
                                                                                                                        class="form-control"
                                                                                                                        id="image" />
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="text-danger m-2">
                                                                                                                    @error('image')
                                                                                                                    {{$message }}
                                                                                                                    @enderror
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class=" mt-sm-3 mt-lg-0 mt-md-0 m-5  "  >
                                                                                                            <img src="{{ asset('../uploads/profile/' . $image->name) }}" alt="Icon Image" width="200" height="200" style="object-fit: contain" class="img-fluid">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="image-category">
                                                                                                            Image
                                                                                                            Category</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">

                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="category"
                                                                                                                    class="form-control "
                                                                                                                    id="image-category"
                                                                                                                    value="{{ $image->category }}" />
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="text-danger m-2">
                                                                                                                @error('category')
                                                                                                                {{ $message }}
                                                                                                                @enderror
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="submit"
                                                                                                            class="btn btn-primary"
                                                                                                            data-bs-dismiss="modal">Submit</button>
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
                                                                                <form action="{{ route('file.destroy', $image->id) }}" method="post"
                                                                                    class="d-inline">
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
                                                            {{ $images->links() }}
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
