<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Category;

class FetchFakeStoreData extends Command
{
    // The name and signature of the command
    protected $signature = 'fetch:fake-store-data';

    // The command description
    protected $description = 'Fetch product and category data from the FakeStore API and store in the database';

    public function __construct()
    {
        parent::__construct();
    }

    // Execute the console command
    public function handle()
    {
        $this->info('Fetching categories...');
        // Fetch categories from the API
        $categoriesResponse = Http::get('https://fakestoreapi.com/products/categories');
        $categories = $categoriesResponse->json();

        // Insert categories into the database
        foreach ($categories as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]);
        }

        $this->info('Categories fetched and stored!');

        $this->info('Fetching products...');
        // Fetch products from the API
        $productsResponse = Http::get('https://fakestoreapi.com/products');
        $products = $productsResponse->json();

        // Insert products into the database with category references
        foreach ($products as $productData) {
            $category = Category::where('name', $productData['category'])->first();

            Product::firstOrCreate([
                'title' => $productData['title'],
                'price' => $productData['price'],
                'description' => $productData['description'],
                'category_id' => $category->id,
                'image' => $productData['image'],
            ]);
        }

        $this->info('Products fetched and stored successfully!');

        return 0;
    }
}
