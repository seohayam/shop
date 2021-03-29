<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreOwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_owners')->insert(
        [
            [                
                'name' => "kame",
                'email' => "s@bcd",
                "password" => bcrypt("asdfghjkl"),                
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [                
                'name' => "same",
                'email' => "s@bce",
                "password" => bcrypt("kame"), 
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),               
            ],
            [                
                'name' => "tome",
                'email' => "s@bcf",
                "password" => bcrypt("mame"), 
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),               
            ]            
        ]);
    }
}
