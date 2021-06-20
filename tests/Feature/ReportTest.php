<?php

namespace Tests\Feature;
use App\Models\Report;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class testReport extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_report_page_load()
    {
        $response = $this->get('/report');

        $response->assertStatus(200);
    }

    public function testData()
    {

        // $response = $this->postJson('api/reports', ['price' => rand(1,20).'.'.rand(1,99)]);

        // $response->assertStatus(200);

    
    }

}
