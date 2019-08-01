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
        	DB::table('users')->insert([
    		'name' => 'Nguyễn Văn A',
    		'email' => 'minhhieu97.hust@gmail.com',
    		'password' => bcrypt('minhhieu97'),
    		'role' => 'admin', 
    		'description' => 'abc'
    	]);
    }
}
