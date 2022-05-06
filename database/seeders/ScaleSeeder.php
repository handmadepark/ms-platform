<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scale;
class ScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scale::create([
            'scale_name' => 'US'
        ]);
        Scale::create([
            'scale_name' => 'UK/AU'
        ]);
        Scale::create([
            'scale_name' => 'FR'
        ]);
        Scale::create([
            'scale_name' => 'DE'
        ]);
    }
}
