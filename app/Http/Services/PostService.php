<?php


namespace App\Http\Services;

use App\Models\Categories;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PostService
{
    public function getCategory(){
        return Categories::get();
    }

    public function getAll(){
        return Post::with('post')->orderby('id')->paginate(3);
    }

    public function insert($request){
        try {
            $request->except('_token');
            Post::create($request->all());

            Session::flash('success', 'Post added successfully');
        } catch (\Exception $err) {
            Session::flash('error', 'Post added error');
            return false;
        }

        return true;
    }

    public function update($request, $post)
    {
        try {
            $post->fill($request->input());
            $post->save();
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

        $post = Post::where('id', $id)->first();

        if ($post) {
            $post->delete();
            return true;
        }

        return false;
    }
}