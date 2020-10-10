<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'administrator']);
        $user = Role::create(['name' => 'user']);

        //Create Permissions
        $systemManagementPermissions = ['dashboard'];
        $userManagementPermissions = ['view user', 'create user', 'edit user', 'archive user'];
        $roleManagementPermissions = ['view role', 'create role', 'edit role', 'archive role'];

        $permissions = array_merge(
            $systemManagementPermissions,
            $userManagementPermissions,
            $roleManagementPermissions,
        );

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        // Assign Permission to role
        $admin->givePermissionTo(Permission::all());

        $user->givePermissionTo(array_merge(
            $systemManagementPermissions,
        ));

    }
}
