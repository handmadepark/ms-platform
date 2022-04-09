<?php

namespace Database\Seeders;

use App\Models\GrandChildCategories;
use Illuminate\Database\Seeder;

class GrandChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrandChildCategories::create([
            'child_id'  => 1,
            'name'      => 'Baseball & Trucker Hats',
            'status'    => 1
        ]);

        GrandChildCategories::create([
            'child_id'  => 1,
            'name'      => 'Beanies & Winter Hats',
            'status'    => 1
        ]);

        GrandChildCategories::create([
            'child_id'  => 1,
            'name'      => 'Sun Hats',
            'status'    => 1
        ]);

        GrandChildCategories::create([
            'child_id'  => 2,
            'name'      => 'Headbands',
            'status'    => 1
        ]);

        GrandChildCategories::create([
            'child_id'  => 2,
            'name'      => 'Fascinators & Mini Hats',
            'status'    => 1
        ]);

        GrandChildCategories::create([
            'child_id'  => 2,
            'name'      => 'Barrettes & Clips',
            'status'    => 1
        ]);

        GrandChildCategories::create([
            'child_id'  => 2,
            'name'      => 'Ties & Elastics',
            'status'    => 1
        ]);

        GrandChildCategories::create([
            'child_id'  => 2,
            'name'      => 'Hair Wreaths & Tiaras',
            'status'    => 1
        ]);
    }
}
