<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\DataFixtures;

use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FixtureLoadTest extends WebTestCase
{
    use FixturesTrait;

    public function testFixtureLoad()
    {
        $this->loadFixtures([
            UserFixtures1::class,
        ]);
    }
}
