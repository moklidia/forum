<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Subject::class, 3)->create()->each(function ($subject) {

        	$students = App\Models\Student::all();
        	foreach ($students as $student) {
                      	factory(App\Models\Point::class, 3)->create([
        		'student_id' => $student->id,
        		'subject_id' => $subject->id 
        		]);
        		 }
    });
    }
}
