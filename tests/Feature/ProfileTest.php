<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfilesTest extends TestCase
{
    use DatabaseMigrations;

   /**
     * @test
     */
    public function a_user_has_a_profile()
    {
        $user = create('App\Models\User');
        $this->get('/profiles/' . $user->name)
        	->assertSee($user->name);
    }
    /**
     * @test
     */
    public function profiles_displays_all_threads_assosiated_with_this_user()
    {
        $user = create('App\Models\User');
        $thread = create('App\Models\Thread', ['user_id' => $user->id]);
        $this->get('/profiles/' . $user->name)
        	->assertSee($thread->title);
    }

    /**
     * @test
     */
    public function profiles_displays_photo_of_user()
    {
        $user = create('App\Models\User');
        $this->get('/profiles/' . $user->name)
        	->assertSee($user->avatar());
    }
}
