<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Group::class, 2)->create()->each(function ($g) {
        	factory(App\Models\Student::class, 5)->create([
        		'group_id' => $g->id
        		]);
        });
    }
}
