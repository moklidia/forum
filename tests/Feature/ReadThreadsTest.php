<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Models\Thread');
    }
    /**
     * @test
     */
    public function a_user_can_view_all_threads()
    {
        
        $this->get('/threads')

            ->assertSee($this->thread->title);
    }
    /**
     * @test
     */
    public function a_user_can_view_a_single_thread()
    {
        
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }
    /**
     * @test
     */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = create('App\Models\Reply', ['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }

    /**
     * @test
     */
    public function a_user_can_view_threads_associated_with_a_channel()
    {
        $channel = create('App\Models\Channel');
        $threadsInChannel = create('App\Models\Thread', ['channel_id' => $channel->id]);
        $threadsNotInChannel = create('App\Models\Thread');

        $this->get('/threads/'.$channel->slug)
            ->assertSee($threadsInChannel->title)
            ->assertDontSee($threadsNotInChannel->title);
    }
}
