<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'application_id' => 1,
                'content' => 'こんにちは',
                'from_user_id' => 1,
                'to_store_owner_id' => 1,
                'to_user_id' => null,
                'from_store_owner_id' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],        
            [
                'application_id' => 1,
                'content' => 'good morinig sir!',
                'from_user_id' => 1,
                'to_store_owner_id' => 1,
                'to_user_id' => null,
                'from_store_owner_id' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' => 1,
                'content' => 'wellcome!',
                'to_user_id' => 1,
                'from_store_owner_id' => 1,
                'from_user_id' => null,
                'to_store_owner_id' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' => 1,
                'content' => 'Hi!',                
                'to_user_id' => 1,
                'from_store_owner_id' => 1,
                'from_user_id' => null,
                'to_store_owner_id' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],         
        ]);    
    }
}
