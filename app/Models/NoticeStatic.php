<?php

namespace App\Models;

use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class NoticeStatic extends Model
{
    protected $table = 'notice_statics';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'description',
        'views',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];
}