@extends('restaurant-backend.layouts.main')
@section('title', 'book-table ')
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
                                        <h4 class="page-title text-left">Book Table Details</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Book-table</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Book-table-List</a></li>

                                        </ol>
                                    </div>

                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('booktable.create') }}" data-toggle="modal"
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
                                                                        <th data-priority="4">TABLE-NAME</th>
                                                                        <th data-priority="4">TABLE-PRICE</th>
                                                                        <th data-priority="4">DESCRIPTION</th>
                                                                        <th data-priority="4">CATEGORY</th>
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($BookTables as $table)
                                                                        <tr>
                                                                            <td>{{ $table->tablename }}</td>
                                                                            <td>{{ $table->tableprice }}</td>
                                                                            <td>{{ $table->description }}</td>
                                                                            <td>{{ $table->category }}</td>
                                                                            <td class="text-center">
                                                                                {{-- edit model button --}}
                                                                                <a href=""
                                                                                    class="btn-sm btn btn-success"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#fileModalEdit_{{ $table->id }}"><i
                                                                                        class="fa fa-edit px-1"></i>Edit</a>


                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="fileModalEdit_{{ $table->id }}"
                                                                                    tabindex="-1" file="dialog"
                                                                                    aria-labelledby="fileModalLabel_{{ $table->id }}"
                                                                                    aria-hidden="true">
                                                                                    <div
                                                                                        class="modal-dialog  modal-dialog-centered">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="staticBackdropLabel">
                                                                                                    Edit Book Table</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal"
                                                                                                    aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <form
                                                                                                    action="{{ route('booktable.update', $table->id) }}"
                                                                                                    method="POST">
                                                                                                    @csrf
                                                                                                    @method('put')
                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="table-name">
                                                                                                            TABLE-NAME</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">

                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="tablename"
                                                                                                                    class="form-control"
                                                                                                                    id="table-name"
                                                                                                                    value="{{ $table->tablename }}" />
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="text-danger m-2">
                                                                                                                @error('tablename')
                                                                                                                    {{ $message }}
                                                                                                                @enderror
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="tableprice">
                                                                                                            TABLE-PRICE</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">

                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    name="tableprice"
                                                                                                                    class="form-control"
                                                                                                                    id="table-price"
                                                                                                                    value="{{ $table->tableprice }}" />
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="text-danger m-2">
                                                                                                                @error('tableprice')
                                                                                                                    {{ $message }}
                                                                                                                @enderror
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="table-description">
                                                                                                            DESCRIPTION</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="description"
                                                                                                                    class="form-control"
                                                                                                                    id="table-description"
                                                                                                                    value="{{ $table->description }}" />
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="text-danger m-2">
                                                                                                                @error('description')
                                                                                                                    {{ $message }}
                                                                                                                @enderror
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="table-category">
                                                                                                            CATEGORY</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">

                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="category"
                                                                                                                    class="form-control"
                                                                                                                    id="table-category"
                                                                                                                    value="{{ $table->category }}" />
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
                                                                                <form id="deleteForm"
                                                                                    action="{{ route('booktable.destroy', $table->id) }}"
                                                                                    method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger btn-sm delete btn-flat"
                                                                                        onclick="return confirm('Are you sure to delete')">
                                                                                        <i class='fa fa-trash'></i>
                                                                                        Delete
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <div class="py-1 px-4">
                                                            {{  $BookTables->links() }}
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
