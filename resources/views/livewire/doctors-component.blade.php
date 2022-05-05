<div class="row">
    <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

        <!-- Search Filter -->
        <div class="card search-filter">
            <div class="card-header">
                <h4 class="card-title mb-0">Search Filter</h4>
            </div>
            <div class="card-body">
                <div class="filter-widget">
                    <div class="">
                        <input type="text" class="form-control " wire:model="name" placeholder="Enter doctor name">
                    </div>
                </div>

               <div class="form-group"> 
                <select wire:model="speciality" id="" class="form-control">
                    @foreach ($specialites as $speciality)
                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endforeach
                </select>
               </div>
             
            </div>
        </div>
        <!-- /Search Filter -->

    </div>

    <div class="col-md-12 col-lg-8 col-xl-9">
        @foreach ($doctors as $doctor)
            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <a href="{{route('appointment.make',$doctor->id)}}">
                                    <img src="{{asset('assets/img/doctors/'.$doctor->image)}}" class="img-fluid"
                                        alt="User Image">
                                </a>
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name"><a href="{{route('appointment.make',$doctor->id)}}">Dr. {{ $doctor->name }}</a>
                                </h4>
                                <p class="doc-speciality">{{ $doctor->about }}</p>
                                <h5 class="doc-department"><img src="{{asset('assets/img/specialities/'.$doctor->speciality->image)}}"
                                        class="img-fluid" alt="Speciality">{{ $doctor->speciality->name }}</h5>

                                <div class="clinic-details">
                                    <p class="doc-location"><i
                                            class="fas fa-map-marker-alt"></i>{{ $doctor->location }}</p>

                                </div>

                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>

                                    <li><i class="fas fa-map-marker-alt"></i>{{ $doctor->location }}</li>
                                    <li><i class="far fa-money-bill-alt"></i>{{ $doctor->price }} <i
                                            class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{ route('appointment.make', $doctor->id) }}">Book
                                    Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->
        @endforeach


      

    </div>
</div>
