<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'city_id' => 1,
            'name' => 'THPT Thai Phien',
        ]);

        DB::table('schools')->insert([
            'city_id' => 1,
            'name' => 'TT GD TX',
        ]);

        DB::table('schools')->insert([
            'city_id' => 1,
            'name' => 'THPT Tran Phu',
        ]);

        DB::table('schools')->insert([
            'city_id' => 2,
            'name' => 'THPT Bui Thi Xuan',
        ]);

        DB::table('schools')->insert([
            'city_id' => 3,
            'name' => 'THPT Trung Vuong',
        ]);
    }
}
