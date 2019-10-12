<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User Test',
            'email' => 'user.test.12@mail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
