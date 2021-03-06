<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $patients = User::paginate(10);
        // dd($patients->last()->appointments->last()->appointment_day);
        return view('admin.patients.index', compact('patients'));
    }
}
