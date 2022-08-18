<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        $response = $this->call('POST','api/user/register',[
            'name' => 'Example Name',
            'email' => 'example@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);
        
        $response->assertStatus(200);
    }
}
