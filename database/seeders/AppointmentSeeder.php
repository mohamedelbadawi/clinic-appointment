<?php

namespace Database\Seeders;

use App\Http\traits\helper;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use helper;

    public function run()
    {

        $faker = Factory::create();
        $requestArr = array('Approved', 'Pending', 'Canceled');
        $statusArr = ['Compeleted', 'Canceled'];
        $doctors = Doctor::all()->pluck('id');
        $users = User::all()->pluck('id');
        $hours = $this->hoursRange(36000, 79200, 60 * 60, 'h:i a');
        for ($i = 1; $i < 200; $i++) {
            # code...
            Appointment::create([
                'doctor_id' => $doctors->random(),
                'user_id' => $users->random(),
                'appointment_time' =>   Arr::random($hours),
                'created_at' => NOW(),
                'appointment_day' => Carbon::today(),
                'amount' => rand(100, 400),
            ]);
        }
    }
}
