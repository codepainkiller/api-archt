<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\PhotoTransform;
use App\Http\Transformers\PlaceTransform;
use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlaceController extends ApiController
{
    /**
     * @var PhotoTransform
     */
    private $photoTransform;
    /**
     * @var PlaceTransform
     */
    private $placeTransform;

    public function __construct(PhotoTransform $photoTransform, PlaceTransform $placeTransform)
    {
        $this->photoTransform = $photoTransform;
        $this->placeTransform = $placeTransform;
    }

    public function index(Request $request)
    {
        $limit = $request->get('limit') ?: 50;
        $places = Place::paginate($limit);

        return $this->respondWithPagination($places, [
           'data' => $this->placeTransform->transformCollection($places->all())
        ]);
    }

    public function show($id)
    {
        $place = Place::find($id);

        if (! $place) {
            return $this->respondNotFound('Lugar no encontrado.');
        }

        return $this->respond([
            'data' => $this->placeTransform->transform($place)
        ]);
    }

    public function photos($id)
    {
        $place = Place::find($id);

        if (! $place) {
            return $this->respondNotFound('Lugar no encontrado.');
        }

        $photos = $place->photos;

        return $this->respond([
            'count' => $photos->count(),
            'data' => $this->photoTransform->transformCollection($photos->toArray())
        ]);
    }

}
