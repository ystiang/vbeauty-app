<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'create-comm-data']);
        Permission::create(['name' => 'edit-comm-data']);
        Permission::create(['name' => 'delete-comm-data']);

        Permission::create(['name' => 'create-pkg-data']);
        Permission::create(['name' => 'edit-pkg-data']);
        Permission::create(['name' => 'delete-pkg-data']);
        
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-comm-data',
            'edit-comm-data',
            'delete-comm-data',
            'create-pkg-data',
            'edit-pkg-data',
            'delete-pkg-data',
        ]);

        $userRole->givePermissionTo([
            'create-comm-data',
            'edit-comm-data',
            'delete-comm-data',
        ]);
    }
}
