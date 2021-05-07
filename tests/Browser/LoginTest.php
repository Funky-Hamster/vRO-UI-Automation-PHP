<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        // $user = User::factory()->create([
        //     'email' => 'Yunnan.Xu@dell.com',
        // ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'Yunnan.Xu@dell.com')
                    ->type('password', 'Benner817922')
                    ->press('Log in')
                    ->assertPathIs('/vro-ui-automation/public/dashboard');
            $browser->visit('/dashboard')
                    ->screenshot('home');
        });
    }
}
