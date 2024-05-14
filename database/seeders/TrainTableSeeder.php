<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainTableSeeder extends Seeder
{

    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 69; $i++) {

            $new_train = new Train();
            $new_train->company = $faker->words(1, true);
            $new_train->arrival_station = $faker->words(1, true);
            $new_train->slug = $this->makeSlug($new_train->company);
            $new_train->departure_station = $faker->words(1, true);
            $new_train->time_departure = $faker->time();
            $new_train->time_arrival = $faker->time();
            $new_train->train_code = $faker->numberBetween(100000000000, 999999999999);
            $new_train->carriage_number = $faker->numberBetween(2, 20);
            $new_train->save();
        }
    }
    private function makeSlug($string)
    {
        $slug = Str::slug($string, '-');
        $original_slug = $slug;
        $exixts = Train::where('slug', $slug)->first();
        $i = 1;
        while ($exixts) {
            $slug = $original_slug . '-' . $i;
            $exixts = Train::where('slug', $slug)->first();
            $i++;
        }
        return $slug;
    }
}
