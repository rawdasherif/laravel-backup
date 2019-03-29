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
        $this->call('CountriesSeeder');
        $this->command->info('Seeded the countries!'); 

        $this->call('RoleTableSeeder');
        $this->command->info('Seeded the Roles!'); 

        $this->call('UsersTableSeeder');
        $this->command->info('Seeded the Users!'); 
    }
}
