<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\PhotoTransform;
use App\Models\Photo;
use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhotosController extends ApiController
{
    /**
     * @var PhotoTransform
     */
    private $photoTransform;

    public function __construct(PhotoTransform $photoTransform)
    {
        $this->photoTransform = $photoTransform;
    }

    public function index()
    {
        $photos = Photo::all();

        return $this->respond([
            'count' => $photos->count(),
            'data' => $this->photoTransform->transformCollection($photos->toArray())
        ]);
    }

}
