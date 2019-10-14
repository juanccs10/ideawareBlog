<?php
use App\User;
use App\Role;
use App\Post;
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

        $post = Post::create([
            'title' => 'Title Post',
            'content' => 'Content Post',
            'user_id' => $user->id
        ]);

        $user = User::create([
        	'name' => 'Juan Camilo',
        	'email' => 'user@mail.com',
        	'password' => bcrypt('123456')
        ]);

        $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
