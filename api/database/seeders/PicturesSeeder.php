<?php

namespace Database\Seeders;

use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Picture::truncate();

            $faker = \Faker\Factory::create();

            for ($i = 0; $i < 20; $i++) {
                Picture::create([
                    'user_id' => $faker->numberBetween(1,10),
                    'path' => $faker->filePath(),
                    'order' => $faker->numberBetween(1, 5)
                ]);
            }
        } catch (\Throwable $exception) {
            var_dump($exception);
        }
    }
}
