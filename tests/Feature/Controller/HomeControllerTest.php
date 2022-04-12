<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_edit()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_simpan()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_akhiri()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_chartperiode()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_chartperusahaan()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
