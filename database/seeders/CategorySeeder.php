<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name'          => 'Jewelry & Accessories',
            'title'         => 'Jewelry & Accessories',
            'description'   => 'Jewelry & Accessories for men and women',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);

        Categories::create([
            'name'          => 'Clothing & Shoes',
            'title'         => 'Clothing & Shoes',
            'description'   => 'Clothing & Shoes for men and women',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);

        Categories::create([
            'name'          => 'Home & Living',
            'title'         => 'Home & Living',
            'description'   => 'Home & Living items for every home',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);

        Categories::create([
            'name'          => 'Wedding & Party',
            'title'         => 'Wedding & Party',
            'description'   => 'Wedding & Party for men and women',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);

        Categories::create([
            'name'          => 'Toys & Entertainment',
            'title'         => 'Toys & Entertainment',
            'description'   => 'Toys & Entertainment for children',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);

        Categories::create([
            'name'          => 'Art & Collectibles',
            'title'         => 'Art & Collectibles',
            'description'   => 'Art & Collectibles for every home and office',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);

        Categories::create([
            'name'          => 'Craft Supplies & Tools',
            'title'         => 'Craft Supplies & Tools',
            'description'   => 'Craft Supplies & Tools for everyone',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);

        Categories::create([
            'name'          => 'Vintage',
            'title'         => 'Vintage',
            'description'   => 'Vintage for every home',
            'keywords'      => '["this is a test keyword"]',
            'status'        => 1
        ]);
    }
}
