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
        ]);
    }

    public function storeUser(CreateUserRequest $request)
    {
        $this->userService->insert($request);

        return redirect()->back();
    }

    public function show(User $user)
    {
        return view('pages.user.edit', [
            'title' => 'Edit Post',
            'user'=> $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $result = $this->userService->update($request, $user);
        if ($result) {
            return redirect('/admin/users/list');
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
