<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->call('POST','api/user/login',[
            'email' => 'ugurtosun50@gmail.com', // Or example@gmail.com after run RegisterTest
            'password' => '12345678',
        ]);
        
        $response->assertStatus(200);
    }
}
