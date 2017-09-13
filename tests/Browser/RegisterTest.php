<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testRegisterFail()
     {
       $this->browse(function (Browser $browser) {
         $browser->visit('/register')
                 ->type('name', 'Laravel Dusk')
                 ->type('email', 'example1@example.com')
                 ->type('password', '123')
                 ->type('password_confirmation', '123')
                 ->press('Register')
                 ->assertPathIs('/register')
                 ->assertSee('The password must be at least 6 characters.');
       });
     }
     public function testRegisterDuplicateEmail()
     {
       $this->browse(function (Browser $browser) {
         $browser->visit('/register')
                 ->type('name', 'Laravel Dusk')
                 ->type('email', 'example@example.com')
                 ->type('password', '123asdf')
                 ->type('password_confirmation', '123asdf')
                 ->press('Register')
                 ->assertPathIs('/register')
                 ->assertSee('The email has already been taken.');
       });
     }
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
          $browser->visit('/register')
                  ->type('name', 'Laravel Dusk')
                  ->type('email', 'example0@example.com')
                  ->type('password', 'example')
                  ->type('password_confirmation', 'example')
                  ->press('Register')
                  ->assertPathIs('/dashboard')
                  ->assertSee('Dashboard');
        });
    }


}
