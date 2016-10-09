<?php

namespace App\Http\Transformers;


class MixareTransform extends Transform
{
    public function transform($place)
    {
        return [
            'id'                => $place['id'],
            'lat'               => $place['lat'],
            'lng'               => $place['lng'],
            'elevation'         => 0,
            'title'             => $place['name'],
            'has_detail_page'   => empty($place['webpage']) ? 0 : 1,
            'webpage'           => $place['webpage']
        ];
    }
}