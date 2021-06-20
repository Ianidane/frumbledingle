<?php

namespace Tests\Feature;
use App\Models\Location;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class testLocation extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_location_page_load()
    {
        $response = $this->get('/locations');

        $response->assertStatus(200);
    }

    public function test_location_api_save_data()
    {

        $response = $this->postJson('api/locations', ['name' => str_random(10)]);

        $response->assertStatus(200);

    
    }

}
