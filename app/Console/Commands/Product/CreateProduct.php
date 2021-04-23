<?php

namespace App\Console\Commands\Product;

use Illuminate\Console\Command;
use App\Services\Product\ProductService;
use App\Services\Category\CategoryService;

class CreateProduct extends Command
{
    /**
     *
     * @var App\Services\Product\ProductService
     */
    protected $productService;

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
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New Product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        parent::__construct();
        $this->productService = $productService; 
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
        $name = $this->ask('What is the name of the product ?'); 
        $description = $this->ask('What is the product description?'); 
        $price = $this->ask('What is the product price?');
        // do { 
        //     $image = $this->ask('Move image to '.storage_path('app/public/images').' And put Image Name?'); 
        // } while ( !is_file(storage_path('app/public/images').'/'.$image) );
        $product_categories_count = $this->ask('How many categories belongs to?');
        // Get Categories Ids
        for ($i=1; $i <= $product_categories_count ; $i++) { 
            $product_categories[$i] = $this->choice('What is the category number ['.$i.'] ?', $categories_id);
        }
        $product = $this->productService->create([
            'categories' => $product_categories,
            'product' => [
                'name' => $name, 
                'description' => $description, 
                'price' => $price, 
                'image' => '/images/image.png' 
            ]
        ]);
        $this->info("Product created!");
    }
}
