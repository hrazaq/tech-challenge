<?php

namespace App\Services;

use App\Repositories\ProductRepository;

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
            $data["product"]["image"] = $this->uploadImage($data["product"]["image"]);
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

    protected function uploadImage(array $data): string
    {
        $imagePath = "";

        if (!empty($data["name"])) {
            file_put_contents(public_path('images/') . $data['name'], $data['content']);
            $imagePath = $data['name'];
        } else {
            $imagePath = "noIamge.png";
        }

        return $imagePath;
    }

    public function decodeBase64(?string $image): array
    {
        $data = [];
        
        if (!empty($image)) {
            $encoded = explode(";base64,", $image);
            $content = base64_decode($encoded[1]);
            $name = time() . '.' . substr($image, 11, strpos($image, ';') - 11);
            $data = ["content" => $content, "name" => $name];
        }

        return $data;
    }

    public function getUrlContent(?string $url): array
    {
        $data = [];

        if (!empty($image)) {
            $content = file_get_contents($url);
            $name = time() . '.' . substr($url, strrpos($url, '.') + 1);
            $data = ["content" => $content, "name" => $name];
        }

        return $data;
    }

}
