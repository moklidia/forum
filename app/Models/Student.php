<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['last_name', 'given_name', 'date_of_birth', 'avg_point'];

    protected $with = ['subjects', 'points'];

    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'points', 'student_id', 'subject_id')->withPivot('points');
    }
    
    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function getAvgPointAttribute()
    {
        return round($this->points->pluck('points')->avg(), 1);
    }
}
