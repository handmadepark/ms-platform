<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(
            [
                'name' => 'Add store',
                'slug' => 'add-store'
            ]
        );
        Permission::create(
            [
                'name' => 'Delete store',
                'slug' => 'delete-store'
            ]
        );
    }
}
