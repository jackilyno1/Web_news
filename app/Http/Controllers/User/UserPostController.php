<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('index', [
            'title' => 'Web News',
            'posts' => $this->postService->getAllUser(),
            'categories' => $this->postService->getCategory(),
        ]);
    }

    public function show($id)
    {   
        return view('user.pages.post.show', [
            'title' => 'Detail Posts',
            'post' => Post::findOrFail($id),
            'categories' => $this->postService->getCategory(),
        ]);
        
    }
}
