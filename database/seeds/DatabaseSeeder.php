<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

   
      public function run()
    {
       $this->call(GroupsTableSeeder::class);
       $this->call(SubjectsTableSeeder::class);
   }
}



   /*
$subjects = factory(App\Models\Subject::class, 3)->create();
        factory(App\Models\Group::class, 2)
            ->create()
            ->each(function (App\Models\Group $group) use ($subjects) {
                factory(App\Models\Student::class, 5)
                    ->create([
                        'group_id' => $group->id,
                    ])
                    ->each(function (App\Models\Student $student) use ($subjects) {
                        $subjects->each(function ($subject) use ($student) {
                            factory(App\Models\Point::class, 3)
                                ->create([
                                    'student_id' => $student->id,
                                    'subject_id' => $subject->id,
                                ]);
                        });
                    });
            });
    }
 */