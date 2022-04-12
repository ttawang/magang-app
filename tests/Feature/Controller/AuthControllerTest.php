<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_showFormLogin()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_login()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_showFormRegister()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_register()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_logout()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
