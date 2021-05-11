<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Goutte\Client;

class Scraper extends Model
{
    public $client = new Client();
    public function visitURL(string $url) {
        $crawler = $this->client->request('GET', $url);
    }

}
