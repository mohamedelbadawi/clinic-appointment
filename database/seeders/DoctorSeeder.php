<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Speciality;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $specialities = Speciality::pluck('id');
        for ($i = 1; $i < 11; $i++) {
            # code...
            Doctor::create([
                'name' => $faker->name(),
                'speciality_id' => $specialities->random(),
                'about' => $faker->sentence(30),
                'image' => $i . '.jpg',
                'price' => rand(100, 500),
                'location' => $faker->address,
                'created_at' => NOW()
            ]);
        }
    }
}
