<?php

namespace Tests\Feature\Controller\siswa;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiswaPerusahaanControllerTest extends TestCase
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
    public function test_get_data()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_daftarkelompok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_daftar()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_keluar()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
