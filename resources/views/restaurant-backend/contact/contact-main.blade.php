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
                                        <h4 class="page-title text-left">Contact Details</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Contact</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Contact list</a></li>

                                        </ol>
                                    </div>
                                    @foreach ($contacts as $contact)
                                        <div class="col-sm-6 text-end">
                                            <div class="float-right d-none d-md-block">
                                                <a href="#" class="btn-sm btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#fileModalEdit_{{ $contact->id }}"><i
                                                        class="fa fa-edit px-1"></i>Edit</a>


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
                                                                <tbody>


                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label"
                                                                            for="address">
                                                                            Address</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group input-group-merge">

                                                                                <input type="text" class="form-control"
                                                                                    id="address"
                                                                                    value="{{ $contact->address }}"
                                                                                    disabled />
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label
                                                                            class="col-sm-2 col-form-label"
                                                                            for="contact-email">
                                                                            email</label>
                                                                        <div class="col-sm-10">
                                                                            <div
                                                                                class="input-group input-group-merge">

                                                                                <input type="email"
                                                                                    class="form-control"
                                                                                    id="contact-email"
                                                                                    value="{{ $contact->email }}" disabled />
                                                                            </div>
                                                                            <div
                                                                                class="text-danger m-2">
                                                                                @error('email')
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label
                                                                            class="col-sm-2 col-form-label"
                                                                            for="contact-phone">
                                                                            phone</label>
                                                                        <div class="col-sm-10">
                                                                            <div
                                                                                class="input-group input-group-merge">
                                                                                <input type="tel"
                                                                                    class="form-control"
                                                                                    id="contact-phone"
                                                                                    value="{{ $contact->phone }}" disabled />
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label
                                                                            class="col-sm-2 col-form-label"
                                                                            for="fax">
                                                                            fax</label>
                                                                        <div class="col-sm-10">
                                                                            <div
                                                                                class="input-group input-group-merge">

                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="contact-fax"
                                                                                    value="{{ $contact->fax }}" disabled />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    {{-- edit model button --}}

                                                                    <!-- Modal -->
                                                                    <div class="modal fade"
                                                                        id="fileModalEdit_{{ $contact->id }}"
                                                                        tabindex="-1" file="dialog"
                                                                        aria-labelledby="fileModalLabel_{{ $contact->id }}"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog  modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="staticBackdropLabel">
                                                                                        Edit Contact</h5>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('contact.update', $contact->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('put')
                                                                                        <div class="row mb-3">
                                                                                            <label
                                                                                                class="col-sm-2 col-form-label"
                                                                                                for="address">
                                                                                                Address</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div
                                                                                                    class="input-group input-group-merge">

                                                                                                    <input type="text"
                                                                                                        name="address"
                                                                                                        class="form-control"
                                                                                                        id="address"
                                                                                                        value="{{ $contact->address }}" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="text-danger
                                                                                                                m-2">
                                                                                                    @error('address')
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <label
                                                                                                class="col-sm-2 col-form-label"
                                                                                                for="contact-email">
                                                                                                email</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div
                                                                                                    class="input-group input-group-merge">

                                                                                                    <input type="email"
                                                                                                        name="email"
                                                                                                        class="form-control"
                                                                                                        id="contact-email"
                                                                                                        value="{{ $contact->email }}" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="text-danger m-2">
                                                                                                    @error('email')
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <label
                                                                                                class="col-sm-2 col-form-label"
                                                                                                for="contact-phone">
                                                                                                phone</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div
                                                                                                    class="input-group input-group-merge">

                                                                                                    <input type="tel"
                                                                                                        name="phone"
                                                                                                        class="form-control"
                                                                                                        id="contact-phone"
                                                                                                        value="{{ $contact->phone }}" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="text-danger
                                                                                                                m-2">
                                                                                                    @error('phone')
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <label
                                                                                                class="col-sm-2 col-form-label"
                                                                                                for="fax">
                                                                                                fax</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div
                                                                                                    class="input-group input-group-merge">

                                                                                                    <input type="text"
                                                                                                        name="fax"
                                                                                                        class="form-control"
                                                                                                        id="contact-fax"
                                                                                                        value="{{ $contact->fax }}" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="text-danger
                                                                                                                m-2">
                                                                                                    @error('fax')
                                                                                                        {{ $message }}
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary"
                                                                                                data-bs-dismiss="modal">Update</button>
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-bs-dismiss="modal">Close</button>

                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    @endforeach



                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <div class="py-1 px-4">
                                                            {{ $contacts->links() }}
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
