<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }

    public function create(array $data): object
    {
        $createdCategory = $this->categoryRepository->create($data);

        return $createdCategory;
    }

    public function find(int $id): bool
    {
        $existed = $this->categoryRepository->find($id);

        return $existed;
    }

    public function delete(int $id)
    {
        $this->categoryRepository->delete($id);
    }

}
