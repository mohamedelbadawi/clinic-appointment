@foreach ($appointments as $appointment)
    <tr>
        <td>
            <h2 class="table-avatar">
                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                        src="{{ asset('assets/img/doctors/' . $appointment->doctor->image) }}" alt="User Image"></a>
                <a href="profile.html">{{ $appointment->doctor->name }}</a>
            </h2>
        </td>
        <td>{{ $appointment->doctor->speciality->name }}</td>
        <td>
            <h2 class="table-avatar">
                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                        src="{{ asset('assets/img/patients/patient1.jpg') }}" alt="User Image"></a>
                <a href="profile.html">{{ $appointment->patient->name }}</a>
            </h2>
        </td>
        <td>{{ $appointment->appointment_day }}<span
                class="text-primary d-block">{{ $appointment->appointment_time }}</span>
        </td>
        <td>
            <div class="appointment-action">

                <button wire:click="acceptAppointment('{{ $appointment->id }}')" class="btn btn-sm bg-success-light">
                    Compeleted
                </button>
                <button wire:click="cancelAppointment('{{ $appointment->id }}')" class="btn btn-sm bg-danger-light">
                    Canceled
                    </a>
            </div>
        </td>
        <td class="text-right">
            {{ $appointment->amount }} EGP
        </td>
    </tr>
@endforeach
