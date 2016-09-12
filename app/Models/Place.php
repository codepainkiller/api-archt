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
}
