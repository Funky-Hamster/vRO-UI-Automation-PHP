<?php

namespace Tests\Browser\Pages;

use Illuminate\Support\Facades\Config;
use Laravel\Dusk\Browser;

class Login extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return Config::get('constants.VSPHERE_HOST') . '/ui';
    }

    /**
     * Login to the vSphere.
     *
     * @return void
     */
    public function vSphereLogin(Browser $browser)
    {
        $browser->pause(3000)->screenshot("0508-1")->type('password', Config::get('constants.VSPHERE_PASSWORD'))
                ->type('username', Config::get('constants.VSPHERE_USERNAME'))
                ->press('LOGIN');
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        //
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
