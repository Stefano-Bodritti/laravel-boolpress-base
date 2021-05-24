<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        // ciclo 10 volte per creare 10 post
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post;
            $newPost->title = $faker->sentence(5);
            $newPost->date = $faker->date();
            $newPost->content = $faker->text(300);
            $newPost->image = $faker->imageUrl(640, 480, 'animals', true);
            $newPost->published = $faker->numberBetween(0, 1);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->save();
        }
    }
}
