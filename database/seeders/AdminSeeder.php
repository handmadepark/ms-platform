<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Admin::create(
           [
                'name'      => 'admin',
                'email'     => 'admin@admin.com',
                'password'  => \Hash::make('password')
            ],
           [
                 'name'      => 'editor',
                 'email'     => 'editor@admin.com',
                 'password'  => \Hash::make('password')
           ],
           [
               'name'      => 'author',
               'email'     => 'author@admin.com',
               'password'  => \Hash::make('password')
           ],
       );
    }
}
