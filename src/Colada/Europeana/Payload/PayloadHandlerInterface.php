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
interface PayloadHandlerInterface
{
    /**
     * [create description]
     * @param  PayloadInterface $payload [description]
     * @return [type]                    [description]
     */
    public static function create(PayloadInterface $payload);

    /**
     * Turns the payloadInterface object properties into a flattened
     * array. Each value stores a key|value array. The ApiClient object
     * will use the array to compile an internal request object which is
     * passed on to the HTTP transport.
     *
     * @return array
     */
    public function get();
}
