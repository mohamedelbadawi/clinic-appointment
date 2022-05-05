@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">List of Patient</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Patient</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>Patient Name</th>
                                                <th>Age</th>
                                                <th>Phone</th>
                                                <th>Last Visit</th>
                                                <th>Doctor</th>
                                                <th class="text-right">Paid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <td>{{ $patient->id }}</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a class="avatar avatar-sm mr-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ asset('assets/img/patients/patient1.jpg') }}"
                                                                    alt="User Image"></a>
                                                            <a>{{ $patient->name }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>{{$patient->age}}</td>
                                                    <td>{{ $patient->mobile }}</td>
                                                    <td>

                                                        {{ $patient->appointments->last()->appointment_day ?? 'None' }}

                                                    </td>
                                                    <td>{{ $patient->appointments->last()->doctor->name ?? 'None' }}</td>
                                                    <td class="text-right">
                                                        {{ $patient->appointments->last()->amount ?? 'None' }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <td colspan="6">
                                            <div class="float-right">
                                                {!! $patients->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
