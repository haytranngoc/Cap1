<?php

use Illuminate\Database\Seeder;

class ConfirmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('confirms')->insert([
            'name' => 'Unconfirmed',
        ]);

        DB::table('confirms')->insert([
            'name' => 'Confirmed',
        ]);
    }
}
