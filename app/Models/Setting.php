<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'website',
        'company',
        'domain',
        'address',
        'email',
        'phone',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'hotline'
    ];
}