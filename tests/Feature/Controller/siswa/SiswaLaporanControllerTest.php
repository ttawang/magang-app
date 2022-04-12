<?php

namespace Tests\Feature\Controller\siswa;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiswaLaporanControllerTest extends TestCase
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
    public function test_simpan()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_edit()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_cetak()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
