<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Transport;

use Europeana\Payload\PayloadInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
interface ApiClientInterface
{
    /**
     * @param PayloadInterface $payload The payload to send
     * @param string|null      $apiKey  Required API key to use during the API-call,
     *
     * @return PayloadResponseInterface Actual class depends on the payload used,
     *                                  e.g. chat.postMessage will return an instance of ChatPostMessagePayloadResponse
     */
    public function send(PayloadInterface $payload, $apiKey);
}
