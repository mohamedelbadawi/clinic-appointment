@extends('layouts.app')
@section('content')
    <div class="content success-page-cont">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">
                                <i class="fas fa-check"></i>
                                <h3>Appointment booked Successfully!</h3>
                                <p>Appointment booked with <strong>{{ $request->doctor->name }}</strong><br> on
                                    <strong>{{ $request->appointment_day }}
                                        {{ $request->appointment_time }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->

                </div>
            </div>

        </div>
    </div>
@endsection
