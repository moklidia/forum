<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'groupAverage', 'avg_point'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'points', 'subject_id', 'student_id');
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function getGroupAverage()
    {
        return $this->groupAverage;
    } 

    public function getAvgPointAttribute()
    {
        return $this->students()->pluck('points')->avg();
    }

}
