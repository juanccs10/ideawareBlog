<?php
use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'User Test',
        	'email' => 'user.test.12@mail.com',
        	'password' => bcrypt('123456')
        ]);
        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
