@foreach ($requests as $request)
    <tr>
        <td>
            <h2 class="table-avatar">
                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                        src="{{ asset('assets/img/doctors/' . $request->doctor->image) }}" alt="User Image"></a>
                <a href="profile.html">{{ $request->doctor->name }}</a>
            </h2>
        </td>
        <td>{{ $request->doctor->speciality->name }}</td>
        <td>
            <h2 class="table-avatar">
                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                        src="{{ asset('assets/img/patients/patient1.jpg') }}" alt="User Image"></a>
                <a href="profile.html">{{ $request->patient->name }}</a>
            </h2>
        </td>
        <td>{{ $request->appointment_day }}<span class="text-primary d-block">{{ $request->appointment_time }}</span>
        </td>
        <td>
            <div class="appointment-action">

                <button wire:click="acceptRequest('{{ $request->id }}')" class="btn btn-sm bg-success-light">
                    Accept
                </button>
                <button wire:click="cancelAppointment('{{ $request->id }}')" class="btn btn-sm bg-danger-light">
                    Cancel
                    </a>
            </div>
        </td>
        <td class="text-right">
            {{ $request->amount }} EGP
        </td>
    </tr>
@endforeach
