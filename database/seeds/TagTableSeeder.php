<?php
use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = Tag::create([
        	'name' => 'New'
        ]);

        $tag = Tag::create([
        	'name' => 'LifeMode'
        ]);

        $tag = Tag::create([
        	'name' => 'Population'
        ]);

        $tag = Tag::create([
        	'name' => '2019'
        ]);

        $tag = Tag::create([
        	'name' => 'Learning'
        ]);
    }
}
