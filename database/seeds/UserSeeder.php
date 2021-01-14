<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// seeding users in database
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => ('password')
        ]);        
        $user->save();

        $user = User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => ('password')
        ]);        
        $user->save();

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => ('password')
        ]);        
        $user->save();
    }
}
