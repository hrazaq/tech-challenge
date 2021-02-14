<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    public function all()
    {
        return $this->categoryService->all();
    }

    public function getIds()
    {
        return $this->categoryService->getIds();
    }

}
