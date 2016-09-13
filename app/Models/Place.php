<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';

    protected $fillable = ['lat', 'lng', 'elevation', 'name', 'description', 'webpage', 'category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function audios()
    {
        return $this->hasMany(Audio::class);
    }
}
