<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FortuneControllerTest extends WebTestCase
{
    public function test_index()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $response = $client->getResponse();
        $this->assertTrue($response->isOk(), $response->getStatusCode());
    }
}
