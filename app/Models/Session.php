<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'year', 'added_by'
    ];

    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
