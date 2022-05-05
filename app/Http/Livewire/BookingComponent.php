<?php

namespace App\Http\Livewire;

use App\Http\traits\helper;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class BookingComponent extends Component
{

    use helper;
    public $doctor;
    public  $day;
    public $appointments;

    public $listenters=['getAppointments'];
    public function mount()
    {
        
        $this->day = Carbon::today()->format('Y-m-d');
        $this->appointments = $this->doctor->appointments->where('appointment_day', $this->day)->pluck('appointment_time')->toArray();
    }

    public function getAppointments()
    {
        $this->appointments = $this->doctor->appointments->where('appointment_day', $this->day)->pluck('appointment_time')->toArray();
    }


    public function render()
    {

        $appointments = $this->doctor->appointments->where('appointment_day', $this->day)->pluck('appointment_time')->toArray();
        $hours = $this->hoursRange(36000, 79200, 60 * 60, 'h:i a');

        return view('livewire.booking-component', compact('appointments', 'hours'));
    }
}
