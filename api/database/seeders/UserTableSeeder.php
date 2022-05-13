<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            User::truncate();

            $faker = \Faker\Factory::create();

            $password = Hash::make('admin');

            User::create([
                'name' => 'Administrator',
                'email' => 'admin@test.com',
                'password' => $password,
                'gender' => rand(1, 2),
                'date_of_birth' => $faker->dateTimeBetween('-10 years', '-1 years'),
                'description' => $faker->text(),
            ]);

            // And now let's generate a few dozen users for our app:
            for ($i = 0; $i < 10; $i++) {
                User::create([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'gender' => rand(0, 2),
                    'date_of_birth' => $faker->dateTimeBetween('-10 years', '-1 years'),
                    'description' => $faker->text(),
                    'password' => $password,
                ]);
            }
        } catch (\Throwable $exception) {
            Log::debug(
                $exception->getMessage(),
                ['line' => $exception->getLine(), 'file' => $exception->getFile()]
            );
        }
    }
}
