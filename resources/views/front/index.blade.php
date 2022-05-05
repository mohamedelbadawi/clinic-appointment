@extends('layouts.app')
@section('content')
    <section class="section section-search">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center">
                    <h1>Search Doctor, Make an Appointment</h1>
                    <p>Discover the best doctors</p>
                </div>

                <! </div>
            </div>
    </section>

    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    <section class="section section-specialities">
        <div class="container-fluid">
            <div class="section-header text-center">
                <h2>Clinic and Specialities</h2>
                <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <!-- Slider -->
                    <div class="specialities-slider slider">

                        @foreach ($specialites as $speciality)
                            <!-- Slider Item -->
                            <div class="speicality-item text-center">
                                <div class="speicality-img">
                                    <img src="{{ asset('assets/img/specialities/' . $speciality->image) }}"
                                        class="img-fluid" alt="Speciality">
                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                </div>
                                <p>{{ $speciality->name }}</p>
                            </div>
                        @endforeach
                        <!-- /Slider Item -->


                    </div>


                </div>
            </div>
        </div>
    </section>
    {{-- --------------------------------------------------------- --}}
    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header ">
                        <h2>Book Our Doctor</h2>
                        <p>Lorem Ipsum is simply dummy text </p>
                    </div>
                    <div class="about-content">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout. The point of using Lorem Ipsum.</p>
                        <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
                            will uncover many web sites still in their infancy. Various versions have evolved over the
                            years, sometimes</p>
                        <a href="javascript:;">Read More..</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-slider slider">

                        @foreach ($doctors as $doctor)
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{route('appointment.book',$doctor->id)}}">
                                        <img class="img-fluid" alt="User Image"
                                            src="{{ asset('assets/img/doctors/' . $doctor->image) }}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="{{route('appointment.book',$doctor->id)}}">{{ $doctor->name }}</a>
                                        <i class="fas fa-check-circle verified"></i>
                                    </h3>
                                    <p class="speciality">{{ $doctor->speciality->name }}</p>

                                    <ul class="available-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> {{ $doctor->location }}
                                        </li>
                                        <li>
                                            <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                        </li>
                                        <li>
                                            <i class="far fa-money-bill-alt"></i> {{ $doctor->price }}$
                                        </li>
                                    </ul>
                                    <div class="row row-sm">

                                        <div class="col-6">
                                            <a href="{{route('appointment.book',$doctor->id)}}" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ---------------------------------- --}}
    <section class="section section-features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 features-img">
                    <img src="{{ asset('front/img/features/feature.png') }}" class="img-fluid" alt="Feature">
                </div>
                <div class="col-md-7">
                    <div class="section-header">
                        <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout. </p>
                    </div>
                    <div class="features-slider slider">
                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('front/img/features/feature-01.jpg') }}" class="img-fluid"
                                alt="Feature">
                            <p>Patient Ward</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('front/img/features/feature-02.jpg') }}" class="img-fluid"
                                alt="Feature">
                            <p>Test Room</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('front/img/features/feature-03.jpg') }}" class="img-fluid"
                                alt="Feature">
                            <p>ICU</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('front/img/features/feature-04.jpg') }}" class="img-fluid"
                                alt="Feature">
                            <p>Laboratory</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('front/img/features/feature-05.jpg') }}" class="img-fluid"
                                alt="Feature">
                            <p>Operation</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('front/img/features/feature-06.jpg') }}" class="img-fluid"
                                alt="Feature">
                            <p>Medical</p>
                        </div>
                        <!-- /Slider Item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ------------------------- --}}

@endsection
