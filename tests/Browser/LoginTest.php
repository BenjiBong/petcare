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
     public function testLoginFail()
     {
       $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                     ->type('email', 'example@example.com')
                     ->type('password', 'example12')
                     ->press('Login')
                     ->assertPathIs('/login')
                     ->assertSee('These credentials do not match our records.');
         });
           
     }
    public function testLogin()
    {
      $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'example@example.com')
                    ->type('password', 'example')
                    ->press('Login')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard');
        });
          /*$this->browse(function ($first, $second) {
          $first->loginAs(User::find(1))
          ->visit('/blog');
          $second->loginAs(User::find(2))
          ->visit('/pets');
});*/
    }

}
