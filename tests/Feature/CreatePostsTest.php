<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostsTest extends TestCase
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
    public function guests_may_not_create_posts()
    {
        $this->withExceptionHandling();

        $this->post('/posts')
            ->assertRedirect('/login');

        $this->get('/threads/create')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_create_posts()
    {
        $this->withExceptionHandling()
            ->signIn();

        $post = create('App\Models\Post');

        $this->post('/posts', $post->toArray());
        

        $this->get('/posts/' . $post->id)
            ->assertSee($post->title)
            ->assertSee($post->body);
    }
}
