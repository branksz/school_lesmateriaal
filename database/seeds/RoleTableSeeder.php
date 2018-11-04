<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_school = new Role();
        $role_school->name = 'school';
        $role_school->description = 'School User';
        $role_school->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Admin User';
        $role_admin->save();
    }
}
