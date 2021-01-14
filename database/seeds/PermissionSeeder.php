<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        //seeding permissions in database
        $permission = Permission::create([
            'name' => 'Administer roles & permissions',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Create Post',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Publish Post',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Show Post',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Edit Post',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Delete Post',
            'guard_name' => 'web',
        ]);        
        $permission->save();
    }
}
