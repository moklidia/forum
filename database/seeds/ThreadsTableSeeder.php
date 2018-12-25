<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\Models\Channel::class, 4)->create()->each(
            function ($channel) {*/
        factory(App\Models\Thread::class, 3)->create()->each(
            function ($thread) {
                factory('App\Models\Reply', 2)->create(
                    [
                        'thread_id' => $thread->id,
                    ]
                );
            }
        );
        /*});*/
    }
}
