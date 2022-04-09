<?php

namespace Database\Seeders;

use App\Models\ChildCategories;
use Illuminate\Database\Seeder;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Hats & Caps',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Hair Accessories',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Welding',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Scarves & Wraps',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Belts & Suspenders',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Keychains & Lanyards',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Toiletry Kits & Travel Cases',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Gloves & Mittens',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Umbrellas & Rain Accessories',
            'status'    => 1
        ]);

        ChildCategories::create([
            'subcat_id'    => 1,
            'name'      => 'Wallets & Money Clips',
            'status'    => 1
        ]);
    }
}
