<?php

namespace App\Database;

use Illuminate\Database\Seeder;
use App\Models\User;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Thread::class, 10)->create()->each(
            function ($thread) {
                factory('App\Models\Reply', 5)->create(
                    [
                    'thread_id' => $thread->id,
                    ]
                );
            }
        );
    }
}
