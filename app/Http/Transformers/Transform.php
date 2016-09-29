<?php

namespace App\Http\Transformers;


abstract class Transform
{

    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($items);
}