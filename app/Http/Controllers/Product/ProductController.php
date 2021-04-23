<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Services\Product\ProductService;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // The Main View
    public function index()
    {
        return view("welcome");
    }

    // Get All Products
    public function all()
    {
       return response()->json($this->productService->all(), 200);
    }

    // Create A Product
    public function create(Request $new_product) 
    {
        return response()->json($this->productService->create($new_product->all()), 201);
    }

    // Get Filtred Products By Category
    public function filterByCategory($category_id)
    {
        return response()->json($this->productService->filterByCategory($category_id), 200);
    }
}