@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

    
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Appointments</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Appointments</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-12">

            <!-- Recent Orders -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Speciality</th>
                                    <th>Patient Name</th>
                                    <th>Apointment Time</th>
                                    <th>status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                @livewire('appointment-component')

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
