<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AppointmentComponent extends Component
{

    use LivewireAlert;
    public function acceptAppointment($id)
    {
        $request = Appointment::findOrFail($id);
        $request->update(['status' => 'Compeleted']);

        $this->alert('success', 'Compeleted');
    }
    public function cancelAppointment($id)
    {
        $request = Appointment::findOrFail($id);
        $request->update(['status' => 'Canceled']);
        $this->alert('error', 'Canceled');
    }


    public function render()
    {
        $appointments = Appointment::with('patient', 'doctor')->where('status','Pending')->paginate(10);

        return view('livewire.appointment-component', compact('appointments'));
    }
}
