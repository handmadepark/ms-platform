<?php

namespace Database\Seeders;

use App\Models\SubCategories;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategories::create([
            'parent_id' => 1,
            'name'      => 'Accessories',
            'status'    => 1
        ]);

        SubCategories::create([
            'parent_id' => 1,
            'name'      => 'Bags & Purses',
            'status'    => 1
        ]);

        SubCategories::create([
            'parent_id' => 1,
            'name'      => 'Necklaces',
            'status'    => 1
        ]);

        SubCategories::create([
            'parent_id' => 1,
            'name'      => 'Rings',
            'status'    => 1
        ]);

        SubCategories::create([
            'parent_id' => 1,
            'name'      => 'Earrings',
            'status'    => 1
        ]);

        SubCategories::create([
            'parent_id' => 1,
            'name'      => 'Bracelets',
            'status'    => 1
        ]);

        SubCategories::create([
            'parent_id' => 1,
            'name'      => 'Body Jewelry',
            'status'    => 1
        ]);
    }
}
