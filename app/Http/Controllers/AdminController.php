<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $doctors = Doctor::count();
        $patients = User::count();
        $appointments = Appointment::count();
        $revenue = Appointment::where('status', 'Compeleted')->sum('amount');

        return view('admin.index', compact('doctors', 'patients', 'appointments', 'revenue'));
    }

    public function profileSettings()
    {
        return view('admin.profileSettings');
    }
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:8'
        ]);
        $admin = Admin::findOrFail(auth('admin')->id());



        if (Hash::check($request['oldPassword'], $admin->password)) {
            $admin->update(['password' => bcrypt($request['newPassword'])]);
            Alert('success', 'Password updated successfully');
            return redirect()->route('admin.dashboard');
        } else {

            Alert('error', 'Can\'t update password your old password is incorrect');
            return redirect()->back();
        }
    }
}
