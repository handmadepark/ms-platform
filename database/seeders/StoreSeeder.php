<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ( $i=1; $i<101; $i++)
        {
            Categories::create([
                'name'          => "Category NO - ".$i,
                'title'         => "Category title - ".$i,
                'description'   => "Category_description - ".$i,
                'keywords'      => "['salamadmin','burda test olacaq']",
                'status'        => '["cusytu","nygarykor","qaluq"]'
            ]);
        }
    }
}
