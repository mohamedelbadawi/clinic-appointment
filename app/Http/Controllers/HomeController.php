<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $specialites = Speciality::all();
        $doctors = Doctor::all()->random(10);

        return view('front.index', compact('specialites', 'doctors'));
    }

    public function doctors()
    {
        return view('front.doctors');
    }
}
