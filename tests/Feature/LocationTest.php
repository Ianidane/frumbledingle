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
    public function testLoad()
    {
        $response = $this->get('/locations');

        $response->assertStatus(200);
    }

    public function testData()
    {

        $response = $this->postJson('api/locations', ['name' => str_random(10)]);

        $response->assertStatus(200);

    
    }

}
