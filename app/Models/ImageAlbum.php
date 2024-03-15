<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageAlbum extends Model
{
    protected $table = 'images_albums';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'description',
        'album_id'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
