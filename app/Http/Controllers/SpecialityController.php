<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialityRequest;
use App\Http\traits\helper;
use App\Models\Speciality;
use Exception;
use Illuminate\Http\Request;
use Alert;

class SpecialityController extends Controller
{
    use helper;
    protected $imagePath = 'assets/img/specialities/';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $specialites = Speciality::paginate(10);
        return view('admin.specialites.index', compact('specialites'));
    }
    public function store(SpecialityRequest $request)
    {
        try {
            // dd($request->image);
            $fileName = $this->uploadImage($request->image, $this->imagePath, 64, $request->name);
            Speciality::create(['name' => $request->name, 'image' => $fileName]);
            alert()->success('Done', 'Created successfully');
            return redirect()->route('specialites.index');
        } catch (Exception $e) {
            \Alert::error('Error', 'Can\'t create speciality now');
            return redirect()->route('specialites.index');
        }
    }

    public function update(SpecialityRequest $request, $id)
    {


        try {
            $speciality = Speciality::findOrFail($id);
            if ($request->hasFile('image')) {
                $this->deleteImage($speciality->image, $this->imagePath);
                $fileName = $this->uploadImage($request->image, $this->imagePath, 64, $request->name);
                $speciality->update([
                    'name' => $request->name,
                    'image' => $fileName,
                ]);
            }

            $speciality->update([
                'name' => $request->name
            ]);
            alert()->success('Done', 'updated successfully');
            return redirect()->route('specialites.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Can\'t update speciality now');
            return redirect()->route('specialites.index');
        }
    }
    public function destroy($id)
    {
        try {
            $speciality = Speciality::findOrFail($id);
            $this->deleteImage($speciality->image, $this->imagePath);
            $speciality->delete();
            Alert::success('Done', 'Deleted successfully');
            return redirect()->route('specialites.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Can\'t delete speciality now');
        }
    }
}
