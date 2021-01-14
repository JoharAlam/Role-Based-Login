<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\RoleHasPermission;
use App\ModelHasRole;

class RoleSeeder extends Seeder
{
    public function run()
    {
        //seeding roles in database
        $role = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);        
        $role->save();

        $role = Role::create([
            'name' => 'Manager',
            'guard_name' => 'web',
        ]);        
        $role->save();

        $role = Role::create([
            'name' => 'User',
            'guard_name' => 'web',
        ]);        
        $role->save();

        //seeding role has permissions in database
        $rolehaspermission = RoleHasPermission::create([
            'permission_id' => '1',
            'role_id' => '1',
        ]);
        $rolehaspermission->save();

        $rolehaspermission = RoleHasPermission::create([
            'permission_id' => '2',
            'role_id' => '2',
        ]);
        $rolehaspermission->save();

        $rolehaspermission = RoleHasPermission::create([
            'permission_id' => '4',
            'role_id' => '2',
        ]);
        $rolehaspermission->save();

        $rolehaspermission = RoleHasPermission::create([
            'permission_id' => '5',
            'role_id' => '2',
        ]);
        $rolehaspermission->save();

        $rolehaspermission = RoleHasPermission::create([
            'permission_id' => '4',
            'role_id' => '3',
        ]);
        $rolehaspermission->save();

        //seeding model has role in database
        $modelhasrole = ModelHasRole::create([
            'role_id' => '1',
            'model_type' => 'App\User',
            'model_id' => '1',
        ]);        
        $modelhasrole->save();

        $modelhasrole = ModelHasRole::create([
            'role_id' => '2',
            'model_type' => 'App\User',
            'model_id' => '2',
        ]);        
        $modelhasrole->save();

        $modelhasrole = ModelHasRole::create([
            'role_id' => '3',
            'model_type' => 'App\User',
            'model_id' => '3',
        ]);        
        $modelhasrole->save();
    }
}
