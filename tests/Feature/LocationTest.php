<?php

namespace Tests\Feature;
use App\Models\Location;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function loadTest()
    {
        $response = $this->get('/location');

        $response->assertStatus(200);
    }

    public function dataTest()
    {

        $Location = factory(Location::class)->create();
        $get = $this->getJson('/api/locations');

        $get
            ->assertStatus(200)
            ->assertJson([$Location->toArray()]);
    }

}
