<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /**
     * @test
     */
    public function a_user_can_see_comments_to_a_post()
    {
        $post = create('App\Models\Post');
        $comment = create('App\Models\Comment', ['post_id' => $post->id, 'parent_id' => null]);
        $this->get('/posts/' . $post->id)
            ->assertSee($comment->body);
    }
}
