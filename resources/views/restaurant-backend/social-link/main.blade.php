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
                                        <h4 class="page-title text-left">Social Link Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Social Link</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Social Link
                                                    List</a></li>

                                        </ol>
                                    </div>

                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('sociallink.create') }}"
                                                    class="btn-sm btn btn-primary mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#sociallinkModalCreate_"><i
                                                        class="fa fa-plus px-1"></i>Add</a>
                                                <div class="modal fade" id="sociallinkModalCreate_" tabindex="-1"
                                                    sociallink="dialog" aria-labelledby="sociallinkModalLabel_"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                                    Add Social Link</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('sociallink.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="social_name">Social Name</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <input type="text" name="social_name"
                                                                                    class="form-control" id="social_name"
                                                                                    placeholder="Enter a social_name Name" />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('social_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="social_link">Link</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">
                                                                                <input type="text" name="social_link"
                                                                                    class="form-control" id="social_link"
                                                                                    placeholder="Enter a social site link" />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('social_link')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="social_link_icon">Social Link Icon</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">

                                                                                <input type="text"
                                                                                    name="social_link_icon"
                                                                                    class="form-control"
                                                                                    id="social_link_icon"
                                                                                    placeholder="Enter a social site link" />
                                                                            </div>
                                                                            <div class="text-danger m-2">
                                                                                @error('social_link_icon')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary"
                                                                            data-bs-dismiss="modal">Submit</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>

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
                                                                        <th data-priority="1">Social Name</th>
                                                                        <th data-priority="4">Link</th>
                                                                        <th data-priority="4">Link Icon</th>
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($socialLinks as $sociallink)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $sociallink->name }}</td>
                                                                            <td>{{ $sociallink->link }}</td>
                                                                            <td>{{ $sociallink->link_icon }}</td>
                                                                            <td class="text-center d-flex  ">

                                                                                <a href="#"
                                                                                    class="btn-sm btn btn-success mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#sociallinkModalEdit_{{ $sociallink->id }}"><i
                                                                                        class="fa fa-edit px-1"></i>Edit</a>


                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="sociallinkModalEdit_{{ $sociallink->id }}"
                                                                                    tabindex="-1" sociallink="dialog"
                                                                                    aria-labelledby="sociallinkModalLabel_{{ $sociallink->id }}"
                                                                                    aria-hidden="true">
                                                                                    <div
                                                                                        class="modal-dialog  modal-dialog-centered">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="staticBackdropLabel">
                                                                                                    Edit Social Link</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal"
                                                                                                    aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <form action="{{ route('sociallink.update', $sociallink->id)}}"
                                                                                                    method="POST">
                                                                                                    @csrf
                                                                                                    @method('put')
                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="sociallink">Social
                                                                                                            Link
                                                                                                            Name</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="social_name"
                                                                                                                    class="form-control"
                                                                                                                    id="social_name"
                                                                                                                    value="{{ $sociallink->name }}" />
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="text-danger m-2">
                                                                                                                @error('social_name')
                                                                                                                {{ $message }}
                                                                                                                @enderror
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="social_link">Link</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="social_link"
                                                                                                                    class="form-control"
                                                                                                                    id="social_link"
                                                                                                                    value="{{ $sociallink->link }}" />
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="text-danger m-2">
                                                                                                                @error('social_link')
                                                                                                                   {{ $message }}
                                                                                                                @enderror
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <div class="row mb-3">
                                                                                                        <label
                                                                                                            class="col-sm-2 col-form-label"
                                                                                                            for="social_link-icon">Icon
                                                                                                            Link</label>
                                                                                                        <div
                                                                                                            class="col-sm-10">
                                                                                                            <div
                                                                                                                class="input-group input-group-merge">
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="social_link_icon"
                                                                                                                    class="form-control"
                                                                                                                    id="link-icon"
                                                                                                                    value="{{ $sociallink->link_icon }}" />
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="text-danger m-2">
                                                                                                                @error('social_link_icon')
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
                                                                                <form
                                                                                    action="{{ route('sociallink.destroy', $sociallink->id) }}"
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
                                                            {{ $socialLinks->links() }}
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
