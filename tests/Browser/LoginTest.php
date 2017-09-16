<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
      /*  $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'leonv@gmail.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertPathIs('/dashboard');
                
        });*/

        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(1))
                    ->assertPathIs('/dashboard');
                
        });
    }
}
