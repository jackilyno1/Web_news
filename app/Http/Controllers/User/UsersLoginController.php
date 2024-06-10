<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLoginRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use App\Jobs\SendWelcomeEmailJob;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Session;

class UsersLoginController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function indexUser()
    {
        return view('user.loginUser', [
            'title' =>'Login'
        ]);
    }

    public function loginUser(CreateLoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return redirect()->intended('/home');
        }

        Session::flash('error', 'Email or Password is incorrect');
        return redirect()->back();
    }

    public function showRegistrationForm()
    {
        return view('user.registerUser', [
            'title' =>'Register'
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $emailJob = new SendWelcomeEmailJob();
        dispatch($emailJob);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
