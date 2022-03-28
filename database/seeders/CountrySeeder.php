<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Country;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            Country::create([
                'name' => 'Azerbaijan',
                'status'=>1
            ]);

            Country::create([
                'name' =>   'Russia',
                'status'=>1
            ]);

            Country::create([
                'name' =>'Turkey',
                'status'=>1
            ]);
    }
}
