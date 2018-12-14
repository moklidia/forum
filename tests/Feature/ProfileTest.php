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
    public function profile_displays_photo_of_user()
    {
        $user = create('App\Models\User');
        $response = $this->getJson('/profiles/' . $user->name);
        
        $response->assertSee($user->avatarDir());
    }

    /**
     * @test
     */
    public function an_authorized_user_can_upload_an_avatar()
    {
        $this->be($user = create('App\Models\User'));
        $this->post('/profiles/' . $user->name);
        $response = $this->getJson('/profiles/' . $user->name);
        
        $response->assertSee($user->avatarDir());
    }
}
