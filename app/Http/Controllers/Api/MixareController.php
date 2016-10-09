<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\MixareTransform;
use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MixareController extends Controller
{
    /**
     * @var MixareTransform
     */
    private $mixareTransform;

    public function __construct(MixareTransform $mixareTransform)
    {
        $this->mixareTransform = $mixareTransform;
    }

    public function index()
    {
        $places = Place::all();

        return response()->json([
            'status' => 'OK',
            'num_resuslts' => $places->count(),
            'results' => $this->mixareTransform->transformCollection($places->all())
        ]);
    }
}
