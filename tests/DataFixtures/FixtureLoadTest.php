<?php

namespace App\Tests\DataFixtures;

use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FixtureLoadTest extends WebTestCase
{

    use FixturesTrait;

    public function testFixtureLoad()
    {

        $this->loadFixtures([
            UserFixtures1::class
        ]);
    }
}
