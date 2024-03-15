<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatNoticeNotice extends Model
{
    protected $table = 'cat_notice_notice';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_notice_id',
        'notice_id'
    ];
}