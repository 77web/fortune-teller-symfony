<?php

namespace App\Tests\Controller;

use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FortuneControllerTest extends WebTestCase
{
    use FixturesTrait;

    public function test_index()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $response = $client->getResponse();
        $this->assertTrue($response->isOk(), $response->getStatusCode());
    }

    public function test_show()
    {
        $client = static::createClient();
        $this->loadFixtureFiles([
            __DIR__.'/../../fixtures/fortune_controller.yaml',
        ]);

        $crawler = $client->request('GET', '/show?birthday=1981-01-01');

        $response = $client->getResponse();
        $this->assertTrue($response->isOk(), $response->getStatusCode());

        $this->assertTrue($crawler->filter('body:contains("今日の運勢は最高です！")')->count() === 1);
    }

    public function test_show_該当する占いがない()
    {
        $client = static::createClient();
        $this->loadFixtureFiles([]); // データクリアする

        $client->request('GET', '/show?birthday=1981-01-01');

        $response = $client->getResponse();
        $this->assertEquals(400, $response->getStatusCode());
    }
}
