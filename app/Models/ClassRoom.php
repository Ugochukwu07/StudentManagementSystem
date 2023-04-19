<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'department_id', 'session_id', 'added_by'
    ];

    public function session()
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    
    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
