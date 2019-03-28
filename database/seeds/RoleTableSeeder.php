<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $permission = Permission::create(['name' => 'display gyms']);
        $permission = Permission::create(['name' => 'display citymanagers']);
        $permission = Permission::create(['name' => 'display gymmanagers']);
        $permission = Permission::create(['name' => 'display training sessions']);
        $permission = Permission::create(['name' => 'display buy package']);
        $permission = Permission::create(['name' => 'display revenue']);
        $permission = Permission::create(['name' => 'display users']);
        $permission = Permission::create(['name' => 'display coaches']);
        $permission = Permission::create(['name' => 'display attendance']);
        $permission = Permission::create(['name' => 'display packages']);

        $role = Role::create(['name' => 'admin'])
        ->givePermissionTo(['display gyms', 'display citymanagers','display gymmanagers', 'display training sessions',
        'display buy package','display revenue','display users','display coaches','display attendance','display packages']);

        $role = Role::create(['name' => 'citymanager'])
        ->givePermissionTo(['display gyms','display gymmanagers', 'display training sessions',
        'display buy package','display revenue']);

        $role = Role::create(['name' => 'gymanager'])
        ->givePermissionTo([ 'display training sessions','display buy package','display revenue']);
    }
}
