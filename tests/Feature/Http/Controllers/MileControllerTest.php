<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class MileControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_GetPackage()
    {
        $response = $this->get('/api/package');

        $response->assertStatus(200);
    }

    public function test_GetPackageByID()
    {
        $response = $this->get('/api/package/d0090c40-539f-479a-8274-899b9970bddc');

        $response->assertStatus(200);
    }

    public function test_CreatePackage()
    {
        $response = $this->post('/api/package', [
            //isi parameter sesuai kebutuhan request
            'customer_name' => $this->faker->name(),
            'customer_code' => Str::random(10),
            'transaction_amount' => $this->faker->randomNumber(6),
            'transaction_discount' => $this->faker->randomNumber(1),
        ]);

        $response->assertStatus(200);
    }

    public function test_PutPackage()
    {
        $response = $this->put('/api/package', [
            //isi parameter sesuai kebutuhan request
            'customer_name' => $this->faker->name(),
            'customer_code' => Str::random(10),
            'transaction_amount' => $this->faker->randomNumber(6),
            'transaction_discount' => $this->faker->randomNumber(1),
        ]);

        $response->assertStatus(200);
    }

    public function test_UpdatePackage()
    {
        $response = $this->patch(route('update.package'), [
            //isi parameter sesuai kebutuhan request
            'customer_name' => $this->faker->name(),
            'customer_code' => Str::random(10),
            'transaction_amount' => $this->faker->randomNumber(6),
            'transaction_discount' => $this->faker->randomNumber(1),
        ]);

        $response->assertStatus(200);
    }

    public function test_DeletePackage()
    {
        $response = $this->delete('/api/package/63dfc60f81160d8c2404f112');

        $response->assertStatus(200);
    }
}
