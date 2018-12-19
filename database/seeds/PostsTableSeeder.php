<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        factory('App\Models\Post'::class, 5)
        ->create()
        ->each(function ($post) {
            factory('App\Models\Comment'::class, 3) // Create the root comments.
            ->create(['post_id' => $post->id])
            ->each(function ($comment) use ($post) {
 // Add children to every root.
                $comment->children()->saveMany(factory(App\Models\Comment::class, 2)->make([
                    'post_id' => $comment->post_id
                ]));
                /*->each(function ($comment)  use ($post) { // Add children to every child of every root.
                     $comment->children()->saveMany(factory(App\Models\Comment::class, 2)->make([
                        'post_id' => $post->id
                ]));*/
            });
        });
    }
}
