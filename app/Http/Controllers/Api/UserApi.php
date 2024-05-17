<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserApi extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $users = $this->userService->getAll();
        return response()->json(['users' => $users]);
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $user = $this->userService->insert($request);
        return response()->json(['user' => $user], 201);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json(['user' => $user]);
    }

    public function update(Request $request, User $user): JsonResponse
    {
        $updatedUser = $this->userService->update($request, $user);
        return response()->json(['user' => $updatedUser]);
    }

    public function destroy(User $user): JsonResponse
    {
        $this->userService->delete($user);
        return response()->json(['message' => 'User deleted successfully']);
    }
}
