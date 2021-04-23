<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Services\Product\ProductFormValidatorService;

class ProductRepository
{
    protected $product_form_validator_service;

    public function __construct(ProductFormValidatorService $product_form_validator_service)
    {
        $this->product_form_validator_service = $product_form_validator_service;
    }

    // Get all products
    public function all(): collection
    {
        return Product::all();
    }

    // Create a new product
    public function create(array $new_product): Product
    {
        // $this->product_form_validator_service->isValidated(new Request($new_product));
        $createdProduct = Product::create($new_product['product']);
        foreach ($new_product['categories'] as $category_id) {
            $Product_category['product_id'] =  $createdProduct['id'];
            $Product_category['category_id'] = $category_id;
            ProductCategory::create($Product_category);
        }
        return $createdProduct;
    }

    // Find a product by id
    public function find(int $product_id): Product
    {
        return Product::find($product_id);
    }

    // Delete a product
    public function delete(int $product_id)
    {
        Product::find($product_id)->delete();
    }

    // Get filtred products by a category
    public function filterByCategory(int $category_id): Collection
    {
        return Product::whereHas('categories', function ($query) use ($category_id) { 
            $query->where('categories.id', '=', $category_id); })->get();
    }

}
