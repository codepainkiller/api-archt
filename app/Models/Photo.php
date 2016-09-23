<?php

namespace App\Models;

use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = ['name', 'path', 'thumbnail_path'];

    /**
     * @var UploadedFile
     */
    protected $file;

    protected static function boot()
    {
        static::creating(function($photo) {
            return $photo->upload();
        });
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public static function fromFile(UploadedFile $file)
    {
        $photo = new static;

        $photo->file = $file;

        return $photo->fill([
            'name' => $photo->fileName(),
            'path' => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath()
        ]);
    }

    public function fileName()
    {
        $name =  sha1(
            $this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

    public function filePath()
    {
        return $this->baseDir() . '/' . $this->fileName();
    }

    public function thumbnailPath()
    {
        return $this->baseDir() . '/tn-' . $this->fileName();
    }

    public function baseDir()
    {
        return 'images/places';
    }

    /**
     * Move the photo to the proper folder
     *
     * @return self
     */
    public function upload()
    {
        $this->file->move($this->baseDir(), $this->fileName());

        $this->makeThumbnail();

        return $this;
    }

    /**
     * Create a thumbnail for the new photo
     *
     * @return void
     */
    protected function makeThumbnail()
    {
        Image::make($this->filePath())
            ->fit(200)
            ->save($this->thumbnailPath());
    }

    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);

        parent::delete();
    }
}
