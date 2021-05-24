<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Comment;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        
        // seleziono i post pubblicati
        $posts = Post::where('published', 1)->get();
        // ciclo questi post
        foreach ($posts as $post) {
            // genero n (tra 0 e 3) commenti per ogni post
            $n = rand(0, 3);

            for ($i=0; $i < $n; $i++) { 
                
                $newComment = new Comment();
                $newComment->post_id = $post->id;
                $newComment->name = $faker->name();
                $newComment->content = $faker->text(50);
                $newComment->save();
            }
        }
    }
}
