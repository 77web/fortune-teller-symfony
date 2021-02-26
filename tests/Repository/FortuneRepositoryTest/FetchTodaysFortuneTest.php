<?php

namespace App\Tests\Repository\FortuneRepositoryTest;

use App\Entity\Fortune;
use App\Repository\FortuneRepository;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FetchTodaysFortuneTest extends KernelTestCase
{
    use FixturesTrait;

    /**
     * @var FortuneRepository
     */
    private $SUT;

    protected function setUp(): void
    {
        static::bootKernel();
        $this->loadFixtureFiles([
            __DIR__.'/../../../fixtures/fetch_todays_fortune.yaml',
        ]);

        /** @var FortuneRepository $SUT */
        $this->SUT = self::$kernel->getContainer()->get('doctrine')->getRepository(Fortune::class);
    }

    public function test()
    {
        $actual = $this->SUT->fetchTodaysFortune('山羊座');
        $this->assertNotNull($actual);
        $this->assertEquals('aaaaa', $actual->getFortuneText());
    }

    public function test_存在しない()
    {
        $this->assertNull($this->SUT->fetchTodaysFortune('乙女座'));
    }
}
