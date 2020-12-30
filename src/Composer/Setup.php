<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Composer;

use Composer\Script\Event;

class Setup
{
    protected Event $event;

    public static function setup(Event $event)
    {
        $io = $event->getIO();
        $io->warning('Some Setup Info');
        // echo exec('git pull');
    }
}
