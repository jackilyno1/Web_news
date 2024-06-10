<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('admin.pages.post.list', [
            'title' => 'List of post',
            'posts' => $this->postService->getAll(),
        ]);
    }
    public function create()
    {
        return view('admin.pages.post.add',[
            'title' => 'Create post',
            'categories' => $this->postService->getCategory(),
        ]);
    }

    public function storePost(CreatePostRequest $request)
    {
        $this->postService->insert($request);

        return redirect()->route('post.list');
    }

    public function edit(Post $post)
    {
        return view('admin.pages.post.edit', [
            'title' => 'Edit Post',
            'post'=> $post,
            'categories' => $this->postService->getCategory(),
        ]);
    }

    public function update(CreatePostRequest $request, Post $post)
    {
        $result = $this->postService->update($request, $post);
        if ($result) {
            return redirect('/posts/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request) : JsonResponse
    {
        $result = $this->postService->delete($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Post deleted successfully'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
