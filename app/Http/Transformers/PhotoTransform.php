<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 28/09/16
 * Time: 12:08 AM
 */

namespace App\Http\Transformers;


class PhotoTransform extends Transform
{

    public function transform($photo)
    {
        return [
            'name'      => $photo['name'],
            'uri'       => url() . '/' . $photo['path'],
        ];
    }
}