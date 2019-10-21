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
        	DB::table('admins')->insert([
        		'name' => 'Nguyễn Minh Hiếu',
                'email' => 'minhhieu997.hust@gmail.com',
                'password' => bcrypt('minhhieu97'),
                'level' => '1',
            ]);
    }
}
