<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            DB::table('hours_timesheet')->insert([
                'id' => 0,
                'start_time' => '03:03:00',
                'end_time' => '06:03:00',
            ]);
    }
}
