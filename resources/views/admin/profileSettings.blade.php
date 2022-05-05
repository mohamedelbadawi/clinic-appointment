@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle" alt="User Image"
                                        src="{{ asset('assets/img/profiles/avatar-01.jpg') }}">
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ auth('admin')->user()->name }}</h4>
                                <h6 class="text-muted">{{ auth('admin')->user()->email }}</h6>

                            </div>

                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">

                            <li class="nav-item active">
                                <a class="nav-link">Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">


                        <div id="password_tab" class="">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Change Password</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                            <form method="POST" action="{{ route('profile.update') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" name="oldPassword" class="form-control">
                                                </div>
                                                @error('oldPassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" name="newPassword" class="form-control">
                                                </div>
                                                @error('newPassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>w
                                                    </span>
                                                @enderror

                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Change Password Tab -->

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
