<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\traits\helper;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    use helper;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $patient = User::findOrFail(auth()->id());
        $appointments = $patient->appointments()->paginate(10);


        return view('front.patientAppointment', compact('appointments'));
    }

    public function bookAppointment(Doctor $doctor)
    {



        return view('front.booking', compact('doctor'));
    }

    public function makeAppointment(AppointmentRequest $request, Doctor $doctor)
    {

        try {
            $request = Appointment::create([
                'doctor_id' => $doctor->id,
                'user_id' => auth()->id(),
                'amount' => $doctor->price,
                'appointment_time' => $request->time,
                'appointment_day' => $request->day,
            ]);
            toast('Appointment created successfully', 'success');
            echo "<script>setTimeout(function(){ window.location.href = 'http://127.0.0.1:8000/appointments'; }, 5000);</script>";
            return view('front.AppointmentSuccess', compact('request'));
        } catch (\Throwable $th) {
        }
    }

}
