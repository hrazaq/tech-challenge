<?php

namespace App\Console\Commands\CategoryCli;

use App\Services\CategoryService;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Category';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $categoryService;

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
        $categories = $this->categoryService->all();
        $categoriesId = array_keys(reset($categories));
        $categoriesId[] = 'No_parent_Category';

        do { $name = $this->ask('What is the category name ? '); } while ( !$name or strlen($name) > 250 );

        // print_r(reset($categories));
        $parentCategory = $this->choice('What is the parent_category ? ', $categoriesId);
        $parentCategory = (!empty($parentCategory)? $parentCategory: '');

        $category = $this->categoryService->create([
            "name"=> $name, 
            "parent_id"=> (($parentCategory!='No_parent_Category')? $parentCategory: null)
        ]);

        $this->info("category is sucessfully created!");
    }
}
