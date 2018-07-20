<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(UserRequest $request, UserRepository $userRepository)
    {
        $userRepository->create($request->post());

        return redirect()
            ->route('wrapper');
    }

}
