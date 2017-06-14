<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([[
            'name'      =>  'Opeoluwa Joseph',
            'email'     =>  'oolakan@yahoo.com',
            'password'  =>  bcrypt('success'),
            'phone'     =>  '08179980370',
            'roles_id'  =>  1 ],
        [ 'name'      =>  'Opeoluwa Joseph',
            'email'     =>  'opeoluwa@yahoo.com',
            'password'  =>  bcrypt('success'),
            'phone'     =>  '08179980370',
            'roles_id'  =>  2]
        ]);
    }
}
