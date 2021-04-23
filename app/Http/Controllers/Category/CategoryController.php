<?php

namespace App\Http\Controllers\Category;

use App\Services\Category\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    // Get all Categories
    public function all()
    {
        return response()->json($this->categoryService->all(), 200);
    }
}