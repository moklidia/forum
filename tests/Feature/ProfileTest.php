<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

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
        $this->signIn();

        $thread = create('App\Models\Thread', ['user_id' => auth()->id()]);

        $this->get('/profiles/' . auth()->user()->name)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /**
     * @test
     */
    public function profile_displays_photo_of_user()
    {
        $user = create('App\Models\User');
        $response = $this->getJson('/profiles/' . $user->name);

        $response->assertSee($user->avatar);
    }

    /**
     * @test
     */
    public function an_authorized_user_can_upload_an_avatar()
    {
        $this->be($user = create('App\Models\User'));
        $this->post('/profiles/' . $user->name);
        $response = $this->getJson('/profiles/' . $user->name);

        $response->assertSee($user->avatar);
    }
}
