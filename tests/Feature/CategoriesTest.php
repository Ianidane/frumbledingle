<?php

namespace Tests\Feature;
use App\Models\Category;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class testCategory extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_catagories_page_load()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function test_categories_api_save_data()
    {

        $response = $this->postJson('api/categories', ['name' => str_random(10), 'parent_id' => rand(1,20)]);

        $response->assertStatus(200);

    
    }

}
