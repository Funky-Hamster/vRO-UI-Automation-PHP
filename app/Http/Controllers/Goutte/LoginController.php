<?php

namespace App\Http\Controllers\Goutte;

use App\Models\Goutte\Scraper;
use App\Http\Controllers\Controller;
use App\Models\Goutte\VSphere;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function vSphereLogin() {
        $scraper = new Scraper();
        $vSphereObj = new VSphere();
        return $vSphereObj->login($scraper->getClient());
    }
}
