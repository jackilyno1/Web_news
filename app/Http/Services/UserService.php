<?php


namespace App\Http\Services;

use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{

    public function getAll(){
        return User::orderby('id')->paginate(5);
    }

    public function insert($request){
        try {
            $request->except('_token');
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            Session::flash('success', 'User added successfully');
        } catch (\Exception $err) {
            Session::flash('error', 'User added error');
            return false;
        }

        return true;
    }

    public function update($request, $user)
    {
        try {
            $user->name = (string) $request->input('name');
            $user->email = (string) $request->input('email');
            $user->password = (string) bcrypt($request->input('password'));
            $user->save();
            Session::flash('success', 'Update successful');
        } catch (\Exception $err) {
            Session::flash('error', 'Error update');
            return false;
        }
        return true;
    }
    public function delete($request)
    {
        $id = (int) $request->input('id');

        $user = User::where('id', $id)->first();

        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }
}