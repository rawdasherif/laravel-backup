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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com​',
            'password' => bcrypt('123456'),
            'role'=>'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'citymanager',
            'email' => 'citymanager@gmail.com',
            'password' => bcrypt('12345678'),
            'role'=>'city_manager',
            'National_id'=>'222224',

        ]);
        DB::table('users')->insert([
            'name' => 'gymmanager',
            'email' => 'gymmanager@gmail.com',
            'password' => bcrypt('12345678'),
            'role'=>'gym_manager',
            'National_id'=>'222223'
        ]);
    }
}
