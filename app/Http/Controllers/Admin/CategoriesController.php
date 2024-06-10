<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Categories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function create()
    {
        return view('admin.pages.category.add',[
            'title' => 'Create category',
        ]);
    }

    public function storeCate(CreateCategoryRequest $request)
    {
        $result = $this->categoryService->create($request);

        return redirect()->back();

    }

    public function index()
    {
        return view('admin.pages.category.list', [
            'title' => 'List of category',
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    public function show(Categories $categories)
    {
        // dd($categories->name);
        return view('admin.pages.category.edit', [
            'title' => 'Edit categories: ' . $categories->name,
            'categories' => $categories,
        ]);
    }

    public function update(Categories $categories, CreateCategoryRequest $request)
    {
        $this->categoryService->update($request, $categories);

        return redirect('/categories/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Deleted successfully category'
            ]);
        }
            return response()->json([
                'error' => true
            ]);
    }
}
