<?php

namespace Database\Seeders;

use App\Models\Stores;
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
            Stores::create([
                'country_id'    => mt_rand(1,5),
                'name'          => "Store NO - ".$i,
                'login'         => "store_no_".$i,
                'password'      => Hash::make('salamadmin'.$i),
                'status'        => mt_rand(1,2)
            ]);
        }
    }
}
