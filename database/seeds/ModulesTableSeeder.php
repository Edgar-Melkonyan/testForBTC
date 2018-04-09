<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('modules')->delete();

        \DB::table('modules')->insert([
             0 => [
                'id'           => 1,
                'name'         => 'Last added',
            ],
            1 => [
                'id'           => 2,
                'name'         => 'Most viewed',
            ],
            2 => [
                'id'           => 3,
                'name'         => 'User picked',
            ],
        ]);
    }
}
