<?php

namespace Database\Seeders;

use App\Models\Train;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TrainTableSeederCsv extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trains_csv = fopen(__DIR__ . '/trains.csv', 'r');
        $i = 0;
        while (($row = fgetcsv($trains_csv)) !== false) {
            if ($i > 0) {
                $new_train = new Train();
                $new_train->company = $row[1];
                $new_train->arrival_station = $row[2];
                $new_train->slug = $this->makeSlug($new_train->company);
                $new_train->departure_station = $row[1];
                $new_train->time_departure = $row[3];
                $new_train->time_arrival = $row[4];
                $new_train->train_code = $row[5];
                $new_train->carriage_number = $row[6];
                $new_train->removed = $row[8];
                $new_train->save();
            }
            $i++;
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
