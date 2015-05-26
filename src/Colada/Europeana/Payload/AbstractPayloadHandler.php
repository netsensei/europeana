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

use Colada\Europeana\Payload\PayloadHandlerInterface;
use Colada\Europeana\Payload\PayloadInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
abstract class AbstractPayloadHandler implements PayloadHandlerInterface
{
    /**
     * @var \Colada\Europeana\Payload\PayloadHandlerInterface;
     */
    private $payload;

    /**
     * @var string
     */
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
