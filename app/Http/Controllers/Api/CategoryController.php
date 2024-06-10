<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Categories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAll();
        return response()->json(['categories' => $categories]);
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->create($request);
        return response()->json(['category' => $category], 201);
    }

    public function show(Categories $category): JsonResponse
    {
        return response()->json(['category' => $category]);
    }

    public function update(CreateCategoryRequest $request, Categories $category): JsonResponse
    {
        $updatedCategory = $this->categoryService->update($request, $category);
        return response()->json(['category' => $updatedCategory]);
    }

    public function destroy(Categories $category): JsonResponse
    {
        $this->categoryService->destroy($category);
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
