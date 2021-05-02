<?php

namespace App\UI\Users\Controllers\v1\Auth;

use App\UI\Http\Controllers\Controller;
use App\UI\Users\Requests\v1\Auth\LoginRequest;
use App\Domain\Users\Contracts\UserRepository;
use App\UI\Users\Resources\UserCollection;
use App\UI\Users\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
        $this->resourceItem = UserResource::class;
        $this->resourceCollection = UserCollection::class;
    }

    public function login(LoginRequest $request)
    {
        dd($request);
    }

    public function register(LoginRequest $request)
    {
        dd($request);
    }

    public function users(Request $request): UserCollection
    {
        $collection = $this->userRepository->findByFilters();
        return $this->respondWithCollection($collection);
    }

    public function lang(Request $request): string|array|null
    {
        return __('Hello');
    }
}
