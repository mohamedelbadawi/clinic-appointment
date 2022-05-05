{{-- <div> --}}
<form action="{{ route('appointment.make', $doctor->id) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="booking-doc-info">
                <a href="doctor-profile.html" class="booking-doc-img">
                    <img src="{{ asset('assets/img/doctors/' . $doctor->image) }}" alt="User Image">
                </a>
                <div class="booking-info">
                    <h4><a href="doctor-profile.html">{{ $doctor->name }}</a></h4>

                    <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i>{{ $doctor->location }}
                    </p>
                    <p>{{$doctor->about}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Widget -->
    <div class="card booking-schedule schedule-widget">

        <!-- Schedule Header -->
        <div class="schedule-header">
            <div class="row">
                <div class="col-md-12">

                    <!-- Day Slot -->
                    <div class="day-slot d-flex">
                        <div class="input-group date col-8" id="datepicker">
                            <input type="text" class="form-control"
                                onchange="this.dispatchEvent(new InputEvent('input'))" wire:model="day" name="day">

                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        <button type="button" class="btn-sm btn-success col-4" wire:click="getAppointments"> get
                            available
                        </button>
                    </div>
                    <!-- /Day Slot -->
                    <script type="text/javascript">
                        $(function() {
                            $('#datepicker').datepicker(

                                {
                                    format: 'yyyy-mm-dd'
                                }
                            );
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- /Schedule Header -->

        <!-- Schedule Content -->
        <div class="schedule-cont">
            <div class="row">
                <div class="col-md-12">

                    <!-- Time Slot -->


                    <div class="time-slot">
                        <ul class="clearfix d-flex flex-wrap">
                            @foreach ($hours as $hour)
                                <li class="m-2">
                                    <input type="radio" name="time" id="date{{ $loop->iteration }}"
                                        value="{{ $hour }}" style=" opacity: 0;
                                                                                        position: fixed;
                                                                                        width: 0;"
                                        @if (in_array($hour, $appointments)) disabled @endif>
                                    <label for="date{{ $loop->iteration }}"
                                        class="timing @if (in_array($hour, $appointments)) text-danger @endif  ">
                                        @if (in_array($hour, $appointments))
                                            <del> {{ $hour }} </del>
                                        @else
                                            {{ $hour }}
                                        @endif
                                    </label>
                                </li>
                            @endforeach


                            {{-- <a class="timing" href="#">
                                <span>11:00</span> <span>AM</span>
                            </a>
                            </li> --}}

                        </ul>
                    </div>
                    <!-- /Time Slot -->

                </div>
            </div>

        </div>
        <!-- /Schedule Content -->

    </div>
    <!-- /Schedule Widget -->

    <!-- Submit Section -->
    <div class="submit-section proceed-btn text-right">
        <button type="submit" class="btn btn-primary submit-btn">Book</a>
    </div>
    <!-- /Submit Section -->

</form>
{{-- </div> --}}
