<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\UserTransform;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{

    /**
     * @var UserTransform
     */
    private $userTransform;

    public function __construct(UserTransform $userTransform)
    {
        $this->userTransform = $userTransform;
    }

    public function index(Request $request)
    {
        $limit = $request->get('limit') ?: 10;
        $users = User::paginate($limit);

        return $this->respondWithPagination($users, [
            'data' => $this->userTransform->transformCollection($users->all())
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (! $user) {
            return $this->respondNotFound('Usuario no encontrado.');
        }

        return $this->respond([
            'data' => $this->userTransform->transform($user)
        ]);
    }
}