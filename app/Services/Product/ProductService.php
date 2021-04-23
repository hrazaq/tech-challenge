<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use App\Models\Product;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    // Get all products
    public function all()
    {
        return $this->productRepository->all();
    }

    // Create a product
    public function create(array $new_product): Product
    {
        return $this->productRepository->create($new_product);  
    }

    // Delete a product
    public function delete(int $product_id)
    {
        $this->productRepository->delete($product_id);
    }

    // Find a product by his id
    public function find(int $product_id): Product
    {
        return $this->productRepository->find($product_id);
    }

    // Get filtred products by a category
    public function filterByCategory(int $category_id)
    {
        return $this->productRepository->filterByCategory($category_id);
    }

}
