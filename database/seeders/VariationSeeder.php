<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Variations;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Variations::create([
            'variation_name' => 'Material',
            'input_type'     => 'checkbox',
            'status'         => 1
        ]);

        Variations::create([
            'variation_name' => 'Holiday',
            'input_type'     => 'select',
            'status'         => 1
        ]);
    }
}
