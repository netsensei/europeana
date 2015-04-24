<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Payload;

use Europeana\Payload\PayloadInterface;

class PayloadHandlerFactory
{
    public static function getHandler(PayloadInterface $payload)
    {
        $handler = $payload->getHandlerClass();
        return $handler::create($payload);
    }
}
