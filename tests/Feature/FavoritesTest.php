<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoritesTest extends TestCase
{
     use DatabaseMigrations;


     /**
     * @test
     */
    public function guests_cannot_favorite_anything()
    {
        
        $this->withExceptionHandling()
            ->post('replies/1/favorites')
            ->assertRedirect('login');
    }
    /**
     * @test
     */
    public function an_authenticated_user_can_favorite_any_reply()
    {
        $this->signIn();
        $reply = create('App\Models\Reply');
        $this->post('replies/' . $reply->id . '/favorites');

        $this->assertCount(1, $reply->favorites);
    }

    /**
     * @test
     */
    public function an_authenticated_user_may_favorite_a_reply_only_once()
    {
        $this->signIn();
        $reply = create('App\Models\Reply');
        try {
            $this->post('replies/' . $reply->id . '/favorites');
            $this->post('replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            $this->fail("Didn't expect to insert the same record twice");
        }
        

        $this->assertCount(1, $reply->favorites);
    }
}
