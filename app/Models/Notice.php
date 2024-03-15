<?php

namespace App\Models;

use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\CatNotice;

class Notice extends Model
{
    protected $table = 'notices';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'author',
        'content',
        'description',
        'views',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'tags',
        'status',
    ];

    const ACTIVE = 1;
    const IS_HOT = 1;

    public function cat_notices()
    {
        return $this->belongsToMany(CatNotice::class);
    }
}
