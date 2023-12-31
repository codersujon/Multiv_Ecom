@extends('admin.master');

@section('main-content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
        <div class="breadcrumb-title pe-3">Admin Change Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Change Password</h5>
                                </div>
                                <hr>
                                <form action="{{ route('admin.update.password') }}" method="POST">
                                    @csrf

                                    {{-- Message --}}
                                    @if (session('status'))
                                        <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-success">Success</h6>
                                                    <div>{{ session('status') }}</div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-danger"><i class="bx bxs-message-square-x"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-danger">Danger</h6>
                                                    <div>{{ session('error') }}</div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="row mb-3">
                                        <label for="current_password" class="col-sm-3 col-form-label">Old
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="old_password" class="form-control" id="current_password" placeholder="Old Password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_password" class="col-sm-3 col-form-label">New
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new_password" id="new_password"
                                                placeholder="New Password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_password_confirm" class="col-sm-3 col-form-label">Confirm New
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new_password_confirm" id="new_password_confirm"
                                                placeholder="Confirm New Password">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-5">Update Password</button>
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

@endsection
