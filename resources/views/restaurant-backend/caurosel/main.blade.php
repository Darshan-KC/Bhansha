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
                                        <h4 class="page-title text-left">Caurosel Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Caurosel</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Caurosel
                                                    List</a></li>

                                        </ol>
                                    </div>

                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('caurosel.create') }}"
                                                    class="btn-sm btn btn-primary mx-1"><i
                                                        class="fa fa-plus px-1"></i>Add</a>
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
                                                                        <th data-priority="1">SN</th>
                                                                        <th data-priority="1">Image</th>
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($caurosels as $caurosel)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            @if ($caurosel->image)
                                                                                <td><img src="{{ asset('../uploads/profile/' . $caurosel->image->name) }}"
                                                                                        alt="" width="100"></td>
                                                                            @else
                                                                                <td>Image not availabe</td>
                                                                             @endif
                                                                            <td class="text-center d-flex  ">

                                                                                <a href="{{ route('caurosel.edit', $caurosel->id) }}"
                                                                                    class="btn-sm btn btn-success mx-1"><i
                                                                                        class="fa fa-edit px-1"></i>Edit</a>
                                                                                <form
                                                                                    action="{{ route('caurosel.destroy', $caurosel->id) }}"
                                                                                    method="POST" class="d-inline mx-1">
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
                                                            {{ $caurosels->links() }}
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
