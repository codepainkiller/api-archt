<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 28/09/16
 * Time: 12:08 AM
 */

namespace App\Http\Transformers;


class PlaceTransform extends Transform
{

    public function transform($place)
    {
        return [
            'name'          => $place['name'],
            'lat'           => $place['lat'],
            'lng'           => $place['lng'],
            'description'   => $place['description'],
            'webpage'       => $place['webpage'],
            'category'      => $place['category']['name'],
        ];
    }
}