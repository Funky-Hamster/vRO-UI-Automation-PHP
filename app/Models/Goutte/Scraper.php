<?php

namespace App\Models\Goutte;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class Scraper extends Model
{
    use HasFactory;
    private $client;

    function __construct()
    {
        $this->client = new Client(HttpClient::create(['verify_peer' => false, 'verify_host' => false]));
    }

    public function visitURL(string $url) {
        $crawler = $this->client->request('GET', $url, ['verify' => false]);
        return $crawler;
    }

    public function getClassInfo(Crawler $crawler, string $className) {
        return $crawler->filterXPath('//div[@class="' . $className . '"]');
    }

    public function getClient() {
        return $this->client;
    }


}
