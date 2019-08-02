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
        	DB::table('hourstimesheet')->insert([
    		'start_time' => '7:00',
    		'end_time' => '17:30'    	
            ]);
    }
}
