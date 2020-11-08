<?php

namespace Tests\Feature;

use App\Localization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocalizationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * /product [GET]
     */
    public function testShowReturnOneProducts()
    {
        $localization = Localization::find(1);

        $response = $this->withHeaders(['Content-Type' => 'application/json'])
            ->json('GET', '/api/localizations/' . $localization->user_id, []);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    "user_id",
                    "latitude",
                    "longitude",
                    "created_at",
                    "updated_at"
                 ]);
    }

    /**
     * /product [POST]
     */
    public function testCreateProductNotParamRequired()
    {
        $payload = [
            "latitude" => "-23.002484",
            "longitude" => "27.512154",
        ];

        $response = $this->withHeaders(['Content-Type' => 'application/json'])
            ->json('POST', '/api/localizations', $payload);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     "latitude",
                     "longitude",
                     "updated_at",
                     "created_at",
                     "user_id"
                 ]);
    }
}
