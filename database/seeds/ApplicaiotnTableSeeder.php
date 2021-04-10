<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicaiotnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            [
                'item_id' => 1,
                'applicaiton_status' => 'onboard',
                'from_user_id' => 1,
                'to_store_owner_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]            
        ]);   
    }
}
