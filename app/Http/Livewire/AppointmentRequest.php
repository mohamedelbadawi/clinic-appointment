<?php

namespace App\Http\Livewire;

use App\Mail\AcceptAppointmentRequest;
use App\Models\Appointment;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AppointmentRequest extends Component
{
    use LivewireAlert;
    public $request;
    public function acceptRequest($requestId)
    {
        $request = Appointment::findOrFail($requestId);
        $request->update(['request' => 'Approved']);
        
        $this->alert('success', 'Approved');

        \Mail::to($request->patient->email)->send(new AcceptAppointmentRequest($request));
    }
    public function cancelAppointment($requestId)
    {
        $request = Appointment::findOrFail($requestId);
        $request->update(['request' => 'Canceled']);
        $this->alert('Error', 'Canceled');
    }
    public function render()
    {
        $requests = Appointment::where('request', 'Pending')->with('doctor.speciality', 'patient')->paginate(10);
        return view('livewire.appointment-request', compact('requests'));
    }
}
