<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;


class PetTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testAddFail()
    {
      $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/pets/create')
                    ->type('type', 'Rabbit')
                    ->press('Submit')
                    ->assertPathIs('/pets/create')
                    ->assertSee('The name field is required.');
        });

    }
    public function testAdd()
    {
      $this->browse(function (Browser $browser) {
            $browser->visit('/pets/create')
                    ->type('name', 'Fur Ball')
                    ->type('type', 'Rabbit')
                    ->type('color', 'White')
                    ->press('Submit')
                    ->assertPathIs('/pets')
                    ->assertSee('Pet Saved');
        });

    }

}
