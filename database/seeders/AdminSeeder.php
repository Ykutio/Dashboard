<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            'name' => 'Giorgi',
            'surname' => 'Minasov',
            'email' => 'admin@gmail.com',
            'password' => sha1('admin'), // password sha1 => bcrypt
            '_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        DB::table('admins')->insert($data);
    }

}
