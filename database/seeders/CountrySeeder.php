<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountrySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        $countries_array = [
            'USA', 'Russia', 'Germany', 'Italy', 'France', 'Austria', 'China', 'Great Britan', 'Japan'
        ];
        $array = [];
        for ($i = 0; $i < count($countries_array); $i++) {
            $array[] = [
                'name' => $countries_array[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('countries')->insert($array);
    }

}
