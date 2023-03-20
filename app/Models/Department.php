<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'added_by', 'faculty_id', 'active'
    ];

    public function faculty()
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }

    protected static function boot()
    {

        parent::boot();
    }

    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
