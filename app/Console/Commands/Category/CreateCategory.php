<?php

namespace App\Console\Commands\Category;

use Illuminate\Console\Command;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryFormValidatorService;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New Category';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $categoryService;
    protected $category_form_validator_service;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {  
        $categories[] = $this->categoryService->getIds();
        $categories_id = array_values(reset($categories));
        $categories_id[] = 'No_parent_Category';
        $new_category['name'] = $this->ask('What is the category name ? ');
        $new_category['parent_category_id'] = $this->choice('What is the parent_category ? ', $categories_id);
        $new_category['parent_category_id'] = (($new_category['parent_category_id']!='No_parent_Category')? $new_category['parent_category_id']: null);
        $category = $this->categoryService->create($new_category);
        $this->info("category is sucessfully created!");
    }
}
