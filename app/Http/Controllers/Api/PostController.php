<?php

namespace App\Http\Controllers\Api;

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

    // public function index(): JsonResponse
    // {
    //     $posts = $this->postService->getAll();
    //     return response()->json([
    //         'error' => false,
    //         'message' => 'List of posts',
    //         'data' => $posts
    //     ]);
    // }

    public function store(CreatePostRequest $request): JsonResponse
    {
        $post = $this->postService->insert($request->validated());
        return response()->json([
            'error' => false,
            'message' => 'Post created successfully',
            'data' => $post
        ]);
    }

    public function show(Post $post): JsonResponse
    {
        return response()->json([
            'error' => false,
            'message' => 'Post details',
            'data' => $post
        ]);
    }

    public function update(CreatePostRequest $request, Post $post): JsonResponse
    {
        $updatedPost = $this->postService->update($request->validated(), $post);
        return response()->json([
            'error' => false,
            'message' => 'Post updated successfully',
            'data' => $updatedPost
        ]);
    }

    public function destroy(Post $post): JsonResponse
    {
        $this->postService->delete($post);
        return response()->json([
            'error' => false,
            'message' => 'Post deleted successfully'
        ]);
    }
}
