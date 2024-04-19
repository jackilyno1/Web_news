<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('pages.user.list', [
            'title' => 'List of user',
            'users' => $this->userService->getAll(),
        ]);
    }
    public function create()
    {
        return view('pages.user.add',[
            'title' => 'Create user',
            'roles' => $this->userService->getRole(),
        ]);
    }

    public function storeUser(CreateUserRequest $request, User $user)
    {
        $this->userService->insert($request, $user);
        $user = new User();
        $user->role = $request->input('role');
        return redirect()->back();
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', [
            'title' => 'Edit Post',
            'user'=> $user,
            // 'roles' => $this->userService->getRole(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $result = $this->userService->update($request, $user);
        if ($result) {
            return redirect('/users/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->userService->delete($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'User deleted successfully'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
