<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendSmsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_sms()
    {
        $response = $this->call('POST','api/user/login',[
            'email' => 'ugurtosun50@gmail.com', // Or example@gmail.com after run RegisterTest
            'password' => '12345678',
        ]);
    
        $response->assertStatus(200);
        $response = $this->call('POST','api/sms',[
            'number' => '905362157896', // Or example@gmail.com after run RegisterTest
            'message' => 'This is a test message',
        ]);
        $response->assertStatus(200);
    }
}
