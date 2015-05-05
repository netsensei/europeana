<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Tests\Serializer;

use Colada\Europeana\Serializer\PayloadResponseSerializer;
use Colada\Europeana\Tests\AbstractTestCase;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class PayloadResponseSerializerTest extends AbstractTestCase
{
    /**
     * @var PayloadResponseSerializer
     */
    private $payloadResponseSerializer;

    protected function setUp()
    {
        $this->payloadResponseSerializer = new PayloadResponseSerializer();
    }

    public function testDeserialize()
    {
        $payloadResponse = [
            'apikey' => 'mock',
            'success' => true,
            'action' => 'mock.json',
            'requestNumber' => 999,
            'itemsCount' => 1,
        ];

        $mockResponseClass = 'Colada\Europeana\Tests\Test\Payload\MockPayloadResponse';
        $serializedPayload = $this->payloadResponseSerializer->deserialize(
            $payloadResponse,
            $mockResponseClass
        );

        $this->assertInstanceOf($mockResponseClass, $serializedPayload);
        $this->assertTrue($serializedPayload->isSuccess());
    }
}
