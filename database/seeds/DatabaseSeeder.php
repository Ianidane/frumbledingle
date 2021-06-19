<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => rand(1,20),
            'created_at' => Carbon::create('2000', '01', '01'),
            'updated_at' => Carbon::create('2000', '01', '01'),
            'deleted_at' => null,
            'name' => str_random(10),
            'parent_id' => rand(1,10)
        ]);    
    

        // items 
        // Columns: ID, Name, Category ID, Location ID
        // An item belongs to a location and a category
        DB::table('items')->insert([
            'id' => rand(1,20),
            'category_id' => rand(1,20),
            'location_id' => rand(1,20),
            'name' => str_random(10),
            'price' => rand(1,20).'.'.rand(1,99),
            'created_at' => Carbon::create('2000', '01', '01'),
            'updated_at' => Carbon::create('2000', '01', '01'),
            'deleted_at' => null
        ]); 

        // Locations
        // Columns: ID, Name
        // A location has many items
        DB::table('locations')->insert([
            'id' => rand(1,20),
            'name' => str_random(10),
            'created_at' => Carbon::create('2000', '01', '01'),
            'updated_at' => Carbon::create('2000', '01', '01'),
            'deleted_at' => null
        ]); 
    }
}
