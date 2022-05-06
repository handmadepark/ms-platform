<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InputTypes;
class InputTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InputTypes::create([
            'input_type' => 'text'
        ]);
        InputTypes::create([
            'input_type' => 'select'
        ]);
        InputTypes::create([
            'input_type' => 'multi-select'
        ]);
        InputTypes::create([
            'input_type' => 'checkbox'
        ]);
        InputTypes::create([
            'input_type' => 'radio'
        ]);
    }
}
