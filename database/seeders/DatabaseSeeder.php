<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => '2141720090@student.polinema.ac.id',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
        ]);

        ProductCategory::create([
            'name' => 'Backpack',
            'slug' => 'backpack',
        ]);
        ProductCategory::create([
            'name' => 'Tent',
            'slug' => 'tent',
        ]);
        ProductCategory::create([
            'name' => 'Other Equipment',
            'slug' => 'other-equipment',
        ]);

        Product::create([
            'name' => 'Tenda',
            'category_id' => 2,
            'image' => 'product-images/tenda.jpg',
            'description' => 'Ini Test',
            'stock' => 99,
            'price' => 75000
        ]);
        Product::create([
            'name' => 'Backpack',
            'category_id' => 1,
            'image' => 'product-images/backpack.jpg',
            'description' => 'Ini Test',
            'stock' => 99,
            'price' => 30000
        ]);
        Product::create([
            'name' => 'Nesting',
            'category_id' => 3,
            'image' => 'product-images/nesting.jpg',
            'description' => 'Ini Test',
            'stock' => 99,
            'price' => 20000
        ]);

        $this->call(IndoRegionSeeder::class);
    }
}
