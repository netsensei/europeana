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

use Colada\Europeana\Payload\DatasetPayload;
use Colada\Europeana\Payload\PayloadInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class DatasetPayloadTest extends AbstractPayloadTest
{
        public function testProvider()
        {
            $payload = new DatasetPayload();
            $payload->setDatasetId('001');
            $method = $payload->getMethod();

            $this->assertEquals($method, 'dataset/001.json');
        }

    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new DatasetPayload();

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
