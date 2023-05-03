<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
//        $this->call( [
//            AdminsSeeder::class,
//            BrandsSeeder::class,
//            ModelcarsSeeder::class,
//            CarsSeeder::class,
//        ] );
        
        $this->call( [
            AdminSeeder::class,
            CountrySeeder::class,
            TypeSeeder::class,
            UserSeeder::class,
            WeaponSeeder::class
        ] );
    }

}
