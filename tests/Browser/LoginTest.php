<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginWithWrongCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login')
                    ->type('email','unknown@example.org')
                    ->type('password','invalid-password')
                    ->check('remember')
                    ->press('Login')
                    ->assertPathIs('/login')//we should not be redirected :)
                    ->assertSee('These credentials do not match our records');
        });
    }
}
