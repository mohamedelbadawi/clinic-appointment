@extends('layouts.app')

<style>
    input[type="radio"]:checked+label {
        background-color: #bfb;
        border-color: #4c4;
    }

</style>
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Booking</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    {{-- @dd($doctor) --}}
                    @livewire('booking-component', ['doctor' => $doctor],
                    key($doctor->id))
                </div>

            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
     </script>
    <!-- /Page Content -->
@endsection
