<?php

use Illuminate\Database\Seeder;

class WardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wards')->insert([
            'city_id' => 1,
            'name' => 'Thanh Khê',
        ]);

        DB::table('wards')->insert([
            'city_id' => 1,
            'name' => 'Hải Châu',
        ]);

        DB::table('wards')->insert([
            'city_id' => 2,
            'name' => 'Quan Nhat',
        ]);

        DB::table('wards')->insert([
            'city_id' => 2,
            'name' => 'Quan Tan Binh',
        ]);

        DB::table('wards')->insert([
            'city_id' => 3,
            'name' => 'Ba Dinh',
        ]);

        DB::table('wards')->insert([
            'city_id' => 3,
            'name' => 'Hoan Kiem',
        ]);
    }
}
