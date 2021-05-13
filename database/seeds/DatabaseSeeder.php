<?php

use App\Application;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ItemTableSeeder::class);        
        $this->call(StoreOwnerTableSeeder::class);        
        $this->call(StoreTableSeeder::class);
        $this->call(ApplicaiotnTableSeeder::class);
        $this->call(CommentTableSeeder::class);        
    }
}
