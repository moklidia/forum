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
        $reply = factory('App\Models\Reply')->create(['thread_id' => $this->thread->id]);

        $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);
    }
}
