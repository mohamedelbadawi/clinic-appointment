<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::create([
            'name' => 'Urology',
            'image' => 'urology.png'
        ]);
        Speciality::create([
            'name' => 'Orthopedic',
            'image' => 'orthopedic.png'
        ]);
        Speciality::create([
            'name' => 'Neurology',
            'image' => 'neurology.png'
        ]);
        Speciality::create([
            'name' => 'Dentist',
            'image' => 'dentist.png'
        ]);
        Speciality::create([
            'name' => 'Cardiologist',
            'image' => 'cardiologist.png'
        ]);
    }
}
