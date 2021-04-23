<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Services\Category\CategoryFormValidatorService;

class CategoryRepository
{
    protected $category_form_validator_service;

    public function __construct(CategoryFormValidatorService $category_form_validator_service)
    {
        $this->category_form_validator_service = $category_form_validator_service;
    }

    // Get all categories
    public function all(): Collection
    {
        return Category::all();
    }

    // Create a new category
    public function create(array $new_category): Category
    {
        $this->category_form_validator_service->isValidated(new Request($new_category));
        return Category::create($new_category);
    }

    // Get a category by his id
    public function find(int $category_id): Category
    {
        return Category::find($category_id);
    }

    // Delete a category
    public function delete(int $category_id)
    {
        Category::find($category_id)->delete();
    }

    // Get all categories Ids
    public function getIds()
    {
        return Category::pluck('id')->all();
    }
}
