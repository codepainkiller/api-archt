<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return [
            'version' => '1.0',
            'auth' => [
                'POST   /api/v1/auth/login --email --password'
            ],
            'users' => [
                'GET    /api/v1/users',
                'GET    /api/v1/users/{id}',
            ],
            'places' => [
                'GET    /api/v1/places',
                'GET    /api/v1/places/{id}',
                'GET    /api/v1/places/{id}/photos',
            ]
        ];
    }

}
