<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('users')->delete();

        \DB::table('users')->insert([
    		'id'    => 1,
            'email' => 'user@gmail.com',
            'name' 	=> 'User',
            'password' => bcrypt('secret'),
        ]);
    }
}
