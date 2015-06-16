<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Payload;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class PayloadHandlerFactory
{
    /**
     * Get an instance of type \Colada\Europeana\Payload\PayloadHandlerInterface
     *
     * This factory method will create a handler object based on the type of the
     * PayloadInterface objec which is passed as a method argument.
     *
     * @param \Colada\Europeana\Payload\PayloadInterface $payload
     */
    public static function getHandler(PayloadInterface $payload)
    {
        $handler = $payload->getHandlerClass();

        return $handler::create($payload);
    }
}
