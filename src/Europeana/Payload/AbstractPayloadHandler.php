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

use Europeana\Payload\PayloadHandlerInterface;
use Europeana\Payload\PayloadInterface;

abstract class AbstractPayloadHandler implements PayloadHandlerInterface
{
    private $payload;

    private $apiKey;

    /**
     * @{@inheritdoc}
     */
    public static function create(PayloadInterface $payload)
    {
        $instance = new static();
        $instance->payload = $payload;
        return $instance;
    }

    /**
     * @{@inheritdoc}
     */
    public function getPayload()
    {
        return $this->payload;
    }
}
