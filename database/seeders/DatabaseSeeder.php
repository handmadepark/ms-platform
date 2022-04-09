<?php

namespace Database\Seeders;

use App\Models\GrandChildCategories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call([
            AdminSeeder::class,
            CountrySeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ChildCategorySeeder::class,
            GrandChildCategorySeeder::class,
        ]);
    }
}
