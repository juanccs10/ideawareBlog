<?php
use App\User;
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
        $user = new User();
        $user->name = 'User Test';
        $user->email = 'user.test.12@mail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
