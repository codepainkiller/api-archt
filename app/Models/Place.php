<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $table = 'places';

    protected $fillable = ['lat', 'lng', 'elevation', 'name', 'description', 'webpage', 'category_id'];
}
