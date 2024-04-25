<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'session_id', 'semester',
        'course_code', 'course', 'score', 'grade',
        'addedBy'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }

    public function session()
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }


    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'student_id');
    }


    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
