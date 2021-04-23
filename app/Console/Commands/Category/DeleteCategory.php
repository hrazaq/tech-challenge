<?php

namespace App\Console\Commands\Category;

use Illuminate\Console\Command;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class DeleteCategory extends Command
{
    /**
     *
     * @var App\Services\Category\CategoryService
     */
    protected $categoryService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:delete {category_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Category';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $this->categoryService->delete($this->argument('category_id'));
        $this->info("Category deleted!");
    }
}
