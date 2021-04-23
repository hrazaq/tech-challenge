<?php

namespace App\Services\Category;

use App\Repositories\Category\CategoryRepository;
use App\Models\Category;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    // Get All Categories
    public function all()
    {
        return $this->categoryRepository->all();
    }

    // Create New Category
    public function create(array $new_category): Category
    {
        return $this->categoryRepository->create($new_category);
    }

    // Find A Category By Id
    public function find(int $category_id): Category
    {
        return $this->categoryRepository->find($category_id);
    }

    // Delete A Category
    public function delete(int $category_id)
    {
        $this->categoryRepository->delete($category_id);
    }

    // Get All Categories Ids
    public function getIds(): array
    {
        return $this->categoryRepository->getIds();
    }

}
