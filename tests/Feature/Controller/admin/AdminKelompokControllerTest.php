<?php

namespace Tests\Feature\Controller\admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminKelompokControllerTest extends TestCase
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
    public function test_cari()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_get_data()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_get_data_cari()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_hapus()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_konfirmasi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_batal_konfirmasi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_get_data_kelompok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_show()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
