<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Tests\Payload;

use Colada\Europeana\Payload\ProviderPayload;
use Colada\Europeana\Payload\PayloadInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class ProviderPayloadTest extends AbstractPayloadTest
{
        public function testProvider()
        {
            $payload = new ProviderPayload();
            $payload->setProviderId('001');
            $method = $payload->getMethod();

            $this->assertEquals($method, 'provider/001.json');
        }

    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ProviderPayload();

        return $payload;
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        // Empty
    }
}
