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

    /**
     * @test
     */
    public function a_user_can_filter_threads_by_any_username()
    {
        $this->signIn(create('App\Models\User', ['name' => 'Joe']));
        $threadByJoe = create('App\Models\Thread', ['user_id' => auth()->id()]); 
        $threadNotByJoe = create('App\Models\Thread');

        $this->get('/threads?by=Joe')
            ->assertSee($threadByJoe->title)
            ->assertDontSee($threadNotByJoe->title);
    }

    /**
     * @test
     */
    public function a_user_can_filter_threads_by_popularity()
    {
        $user = create('App\Models\User');

        $threadWithTwoReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['thread_id'=> $threadWithTwoReplies->id], 2);

        $threadWithThreeReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['thread_id'=> $threadWithThreeReplies->id], 3);


        $threadWithNoReplies = $this->thread;
        

        $this->get('/threads?popular=1')
            ->assertSeeTextInOrder([
        $threadWithThreeReplies->title,
        $threadWithTwoReplies->title,
        $threadWithNoReplies->title
        
        ]);
    }

}
