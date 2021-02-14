<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function all(): Collection
    {
        $categories = Category::all();

        return $categories;
    }

    public function create(array $data): object
    {
        $createdCategory = Category::create($data);

        return $createdCategory;
    }

    public function find(int $id): bool
    {
        $exist = Category::find($id)->exists();

        return $exist;
    }

    public function delete(int $id)
    {
        Category::find($id)->delete();
    }

    public function getIds()
    {
        $categoryIds = Category::where('id' ,'>' ,0)->pluck('id')->all();
        

        return $categoryIds;
    }
}
