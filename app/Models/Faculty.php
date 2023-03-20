<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'added_by', 'active',
    ];

    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    protected static function boot()
    {

        parent::boot();
    }
}
