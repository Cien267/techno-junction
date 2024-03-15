<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Bagusindrayana\LaravelCoordinate\Traits\LaravelCoordinate;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = [
        'full_name',
        'position',
        'content',
        'avatar'
    ];
}