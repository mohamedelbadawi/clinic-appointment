<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function appointmentRequests()
    {
        $requests = Appointment::where('request', 'Pending')->with('doctor.speciality', 'patient')->paginate(10);
        // dd($requests);
        return view('admin.appointments.requests', compact('requests'));
    }

    public function index()
    {
        return view('admin.appointments.index');
    }
}
