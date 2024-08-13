<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
