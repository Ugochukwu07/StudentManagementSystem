<?php

namespace App\Models;

use App\Service\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'message', 'type', 'user_id', 'status'
    ];

    public function getFeedTypeAttribute()
    {
        switch ($this->type) {
            case 1:
                return 'success';
                break;
            case 2:
                return 'info';
                break;
            case 3:
                return 'primary';
                break;
            case 4:
                return 'warning';
                break;
            case 5:
                return 'danger';
                break;

            default:
                return 'success';
                break;
        }
    }

    public function getFormatTimeAttribute()
    {
        return (new Service())->duration($this->created_at);
    }
}
