<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_school = Role::where('name', 'school')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $school = new User();
        $school->name = 'school';
        $school->email = 'school@voorbeeld.com';
        $school->password = bcrypt('secret');
        $school->save();
		$school->roles()->attach($role_school);

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@voorbeeld.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}