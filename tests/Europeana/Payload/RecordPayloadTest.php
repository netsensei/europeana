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

use Colada\Europeana\Payload\RecordPayload;
use Colada\Europeana\Payload\PayloadInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class RecordPayloadTest extends AbstractPayloadTest
{
        public function testRecord()
        {
            $payload = new RecordPayload();
            $payload->setRecordId('/12345/123_record');
            $method = $payload->getMethod();

            $this->assertEquals($method, 'record/12345/123_record.json');
        }

    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new RecordPayload();

        return $payload;
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
    }
}
