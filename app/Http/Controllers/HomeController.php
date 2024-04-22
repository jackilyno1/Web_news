<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(){

        return view('index', [
            'title' => 'Dashboard user',
            'categories' => $this->postService->getCategory(),
        ]);
    }

    public function show(){

        return view('user.pages.showCate', [
            'title' => 'Category',
            'posts' => $this->postService->getAll(),
        ]);
    }
}
