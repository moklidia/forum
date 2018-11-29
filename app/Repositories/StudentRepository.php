<?php
namespace App\Repositories;

use App\Models\Group;
use App\Models\Student;

class StudentRepository
{
    /**
     * Get all of the students for a given group.
     *
     * @param  User $user
     * @return Collection
     */
    public function forGroup($id)
    {
        return Student::where('group_id', $id)
            ->orderBy('last_name', 'asc')
            ->get();
    }

}
