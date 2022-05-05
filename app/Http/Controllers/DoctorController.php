<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Http\traits\helper;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Alert;

class DoctorController extends Controller
{
    protected $imagePath = "assets/img/doctors/";
    use helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $doctors = Doctor::with('speciality')->paginate(10);
        $specialites = Speciality::all();
        return view('admin.doctors.index', compact('doctors', 'specialites'));
    }
    public function store(DoctorRequest $request)
    {
        // dd($request);
        try {
            $fileName = $this->uploadImage($request->image, $this->imagePath, 500, $request->name);
            $Doctor = Doctor::create(['name' => $request->name, 'image' => $fileName, 'speciality_id' => $request->speciality_id, 'about' => $request->about]);

            alert()->success('Done', 'Created successfully');
            return redirect()->route('doctors.index');
        } catch (\Throwable $th) {
            alert()->error('Error', 'Can\'t Create it');
            return redirect()->route('doctors.index');
        }
    }

    public function update(DoctorRequest $request, $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            if ($request->hasFile('image')) {
                $this->deleteImage($doctor->image, $this->imagePath);
                $fileName = $this->uploadImage($request->image, $this->imagePath, 64, $request->name);
                $doctor->update([
                    'name' => $request->name,
                    'about' => $request->name,
                    'speciality_id' => $request->speciality_id,
                    'image' => $fileName,
                ]);
            }

            $doctor->update([
                'name' => $request->name,
                'about' => $request->name,
                'speciality_id' => $request->speciality_id,

            ]);
            alert()->success('Done', 'updated successfully');
            return redirect()->route('doctors.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $this->deleteImage($doctor->image, $this->imagePath);
            $doctor->delete();
            Alert::success('Done', 'Deleted successfully');
            return redirect()->route('doctors.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Can\'t delete doctor now');
        }
    }
 
}
