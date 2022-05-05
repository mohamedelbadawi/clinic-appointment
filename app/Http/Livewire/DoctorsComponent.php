<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Speciality;
use Livewire\Component;

class DoctorsComponent extends Component
{
    public $name;
    public $speciality;
 


    public function render()
    {
        $specialites = Speciality::all();
        // $thisdoctors = Doctor::with('speciality')->paginate(10);

        $doctors = Doctor::with('speciality')->when($this->name != null, function ($query) {
            $query->where('name', 'like', '%' . $this->name . '%');
        })->where('speciality_id', $this->speciality ?? 1)->paginate(10);
        // dd($doctors);
        return view('livewire.doctors-component', compact('doctors', 'specialites'));
    }
}
