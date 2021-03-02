<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Helpers\FileHelper;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return $this->productRepository->all();
    }

    public function create(array $data)
    {
        $createdProduct = [];

        if ($this->checkFields($data["product"])) {
            $createdProduct = $this->productRepository->create($data);
        } else {
            abort(500, "The given data is invalid");
        }

        return $createdProduct;
    }

    public function checkFields(array $product): bool
    {
        if (empty($product['name']) || empty($product['price']) || empty($product['description']) || !is_numeric($product['price'])) {
            return false;
        } else {
            return true;
        }
    }

    public function delete(int $id)
    {
        $this->productRepository->delete($id);
    }

    public function find(int $id): bool
    {
        return $this->productRepository->find($id);
    }

    public function filterByCategory(int $id)
    {
        return $this->productRepository->filterByCategory($id);
    }

}
