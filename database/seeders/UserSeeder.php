<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i < 200; $i++) {
            # code...
            User::create([
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'age' => rand(1,60),
                'password' => bcrypt('123456789'),
                'mobile' => $faker->phoneNumber,
                'created_at' => NOW()
            ]);
        }
    }
}
