<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id', 'department_id', 'added_by', 'course', 'course_code',  'start_time', 'end_time', 'canceled', 'day'
        ,'venue', 'lecture'
    ];

    public function student()
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }

    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
