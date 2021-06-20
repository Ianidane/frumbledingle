<?php

namespace Tests\Feature;
use App\Models\Item;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class testItem extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function items()
    {
        $response = $this->get('/items');

        $response->assertStatus(200);
    }

    public function test_items_api_save_data()
    {

        $response = $this->postJson('api/items', ['name' => str_random(10), 'price' => rand(1,20).'.'.rand(1,99), 'location_id' => rand(1,20), 'category_id' => rand(1,20)]);

        $response->assertStatus(200);

    
    }

}
