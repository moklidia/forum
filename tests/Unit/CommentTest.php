<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentTest extends TestCase
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
    public function a_comment_has_a_owner()
    {
        $comment = create('App\Models\Comment');
        $this->assertInstanceOf('App\Models\User', $comment->owner);
    }

    /**
     * @test
     */
}
