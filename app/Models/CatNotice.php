<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notice;

class CatNotice extends Model
{
    protected $table = 'cat_notices';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const CATEGORY_PARENT = 0;
    protected $fillable = [
        'name',
        'slug',
        'parent',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    public function notices()
    {
        return $this->belongsToMany(Notice::class);
    }
}
