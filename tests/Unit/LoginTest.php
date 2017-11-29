<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{   
    public function testLoginPost () {
        //Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'badUsername@gmail.com',
            'password' => 'badPass',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('auth.login', $response->original->name());
    }

    /**
     * Test Login with wrong credentials
     * 
     * @return void
     */
    public function testLoginWithWrongCredentials()
    {
        $this->get('/')
            ->see('Login')
            ->type('unknown@example.org', 'email')
            ->type('invalid-password', 'password')
            ->check('remember')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records');
    }
}
