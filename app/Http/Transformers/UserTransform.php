<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 28/09/16
 * Time: 12:08 AM
 */

namespace App\Http\Transformers;


class UserTransform extends Transform
{

    public function transform($user)
    {
        return [
            'name'      => $user['name'],
            'email'     => $user['email'],
            'type'      => $user['type'],
            'status'    => (boolean) $user['status'],
        ];
    }
}