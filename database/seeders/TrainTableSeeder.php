<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainTableSeeder extends Seeder
{

    public function run(Faker $faker): void
    {
        $new_train = new Train();
        $new_train->slug = $faker->words(1, true);
        $new_train->company = $faker->words(1, true);
        $new_train->arrival_station = $faker->words(1, true);
        $new_train->departure_station = $faker->words(1, true);
        $new_train->time_departure = $faker->time();
        $new_train->time_arrival = $faker->time();
        $new_train->train_code = $faker->words(1, true);
        $new_train->carriage_number = $faker->numberBetween(2, 20);
        $new_train->save();
    }
}
