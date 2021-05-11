<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Login;
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
            $browser->visit(new Login)->screenshot("0508-0")
                    ->vSphereLogin()
                    ->assertSee('vSphere Client');
        });
    }
}
