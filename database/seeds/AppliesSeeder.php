<?php

use Illuminate\Database\Seeder;

class AppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applies')->insert([
            'name' => 'Xét kết quả thi Đại Học',
        ]);
    }
}
