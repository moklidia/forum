<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends TestCase
{
    use DatabaseMigrations;


    public function setUp()
    {
        parent::setUp();

        $this->post = create('App\Models\Post');
    }

    /**
     * @test
     */
    public function a_post_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->post->creator);
    }

    /**
     * @test
     */
    public function a_post_can_have_comments()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->post->comments);
    }
}
