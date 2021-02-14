<?php

namespace App\Console\Commands\ProductCli;

use Illuminate\Console\Command;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CreateProduct extends Command
{
    /**
     *
     * @var App\Services\ProductService
     */
    protected $productService;

    /**
     *
     * @var App\Services\CategoryService
     */
    protected $categoryService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

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
        $this->productService = $productService; 
        $this->categoryService = $categoryService; 
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $categories = $this->categoryService->all();

        do { 
            $name = $this->ask('What is the name of the product ?'); 
        } while ( !$name or strlen($name) > 250 );

        do { 
            $description = $this->ask('What is the product description?'); 
        } while ( !$description or strlen($description) > 250 );

        do { 
            $price = $this->ask('What is the product price?'); 
        } while ( !is_numeric($price) or $price <= 0 );

        do { 
            $image = $this->ask('Move image to '.public_path('images').' And put Image Name?'); 
        } while ( !is_file(public_path('images').'/'.$image) );
        
        // print_r(reset($categories));
        $categoryId = $this->choice('What is the product category_id?', array_keys(reset($categories)));

        // $product = $this->productService->create([
        //     "name" => $name, 
        //     "description" => $description, 
        //     "price" => $price, 
        //     "image" => $image, 
        // ]);

        $this->info("Product created!");
    }
}
