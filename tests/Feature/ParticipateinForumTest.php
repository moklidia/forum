<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateinForumTest extends TestCase
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
    public function unauthenticated_user_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/threads/1/replies', []);
    }
    /**
     * @test
     */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        //Given we have an ajthenticated user
        $this->be($user = create('App\Models\User'));

        //And an existing thread
        $thread = create('App\Models\Thread');
        
        //When the user adds a reply to the thread
        $reply = make('App\Models\Reply');
        $this->post($thread->path().'/replies', $reply->toArray());

        //Then their reply should be visible on the page
        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
