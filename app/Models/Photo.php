<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = ['name'];

    protected $baseDir = 'places/photos';

    public static function formForm(UploadedFile $file)
    {
        $photo = new static;

        $name = time() . $file->getClientOriginalName();

        $photo->name = $photo->baseDir . '/' . $name;

        $file->move($photo->baseDir, $name);

        return $photo;
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
