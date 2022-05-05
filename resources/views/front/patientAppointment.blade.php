@extends('layouts.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{ asset('front/img/patients/patient.jpg') }}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>{{ auth()->user()->name }}</h3>
                                    <div class="patient-details">
                                        <h5> {{ auth()->user()->email }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="active">
                                        <a href="patient-dashboard.html">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>


                                    {{-- <li>
                                        <a href="change-password.html">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li> --}}

                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button href="index-2.html" class="btn" style="">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span>Logout</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
                <!-- / Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body pt-0">

                            <!-- Tab Menu -->
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#pat_appointments"
                                            data-toggle="tab">Appointments</a>
                                    </li>

                                </ul>
                            </nav>
                            <!-- /Tab Menu -->

                            <!-- Tab Content -->
                            <div class="tab-content pt-0">

                                <!-- Appointment Tab -->
                                <div id="pat_appointments" class="tab-pane fade show active">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Doctor</th>
                                                            <th>Appt Date</th>
                                                            <th>Booking Date</th>
                                                            <th>Amount</th>
                                                            <th>request</th>
                                                            <th>Status</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($appointments as $appointment)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html"
                                                                            class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="{{ asset('assets/img/doctors/' . $appointment->doctor->image) }}"
                                                                                alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">{{ $appointment->doctor->name }}
                                                                            <span>{{ $appointment->doctor->speciality->name }}</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{ $appointment->appointment_day }} <span
                                                                        class="d-block text-info">{{ $appointment->appointment_time }}</span>
                                                                </td>
                                                                <td>{{ $appointment->createdAt() }}</td>
                                                                <td>{{ $appointment->amount }}</td>
                                                                <td><span
                                                                        class="badge badge-pill bg-{{ $appointment->request == 'Pending' ? 'warning' : '' }}{{ $appointment->request == 'Approved' ? 'success' : '' }}{{ $appointment->request == 'Canceled' ? 'danger' : '' }}-light">{{ $appointment->request }}</span>
                                                                </td>

                                                                <td><span
                                                                        class="badge badge-pill bg-{{ $appointment->status == 'Pending' ? 'warning' : '' }}{{ $appointment->status == 'Compeleted' ? 'success' : '' }}{{ $appointment->status == 'Canceled' ? 'danger' : '' }}-light">{{ $appointment->status }}</span>
                                                                </td>


                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Appointment Tab -->

                            </div>
                            <!-- Tab Content -->

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
