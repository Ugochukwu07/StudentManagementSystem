<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_number', 'phone_number' , 'address',
        'sex', 'session_id', 'faculty_id', 'class_id',
        'department_id', 'user_id', 'level'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function classRoom()
    {
        return $this->hasOne(ClassRoom::class, 'id', 'class_id');
    }
}
