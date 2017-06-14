<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table('roles')->insert(
            [['name'      =>  'Administrator'],
                ['name'     =>  'Lecturer']
        ]);
    }
}
