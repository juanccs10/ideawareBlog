<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create([
        	'name' => 'admin',
        	'description' => 'Administrator',
        ]);

        $role = Role::create([
        	'name' => 'user',
        	'description' => 'User',
        ]);
    }
}
