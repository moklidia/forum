<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
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
    public function guests_may_not_create_threads()
    {
        $thread = make('App\Models\Thread');

        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/threads', $thread->toArray());
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_create_form_threads()
    {
        $this->signIn();

        $thread = make('App\Models\Thread');

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
