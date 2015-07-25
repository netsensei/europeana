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

use Colada\Europeana\Model\Params;
use Colada\Europeana\Payload\PayloadResponseInterface;
use Colada\Europeana\Serializer\PayloadResponseSerializer;
use Colada\Europeana\Tests\AbstractTestCase;

abstract class AbstractPayloadResponseTest extends AbstractTestCase
{
    private $serializer;

    protected function setUp()
    {
        $this->serializer = new PayloadResponseSerializer();
    }

    public function testPayloadResponse()
    {
        $responseData = array_merge(
            [
                'apikey' => 'foobar',
                'action' => 'mock.json',
                'success' => true,
                'statsDuration' => 1234,
                'requestNumber' => 1234,
                'params' => $this->createParams(), // TBD is this okay?
            ],
        $this->createResponseData());

        /** @var PayloadResponseInterface $actualPayloadResponse */
        $actualPayloadResponse = $this->serializer->deserialize(
            $responseData,
            $this->getResponseClass()
        );

        // $this->assertEquals($responseData['params'], $actualPayloadResponse->getParams());
        $this->assertNotEmpty($actualPayloadResponse->getParams());
        $this->assertInstanceOf('Colada\Europeana\Model\Params', $actualPayloadResponse->getParams());
        $this->assertParams($responseData['params'], $actualPayloadResponse->getParams());

        $this->assertInstanceOf('Colada\Europeana\Payload\PayloadResponseInterface', $actualPayloadResponse);
        $this->assertInstanceOf($this->getResponseClass(), $actualPayloadResponse);
        $this->assertEquals($responseData['apikey'], $actualPayloadResponse->getApikey());
        $this->assertEquals($responseData['action'], $actualPayloadResponse->getAction());
        $this->assertEquals($responseData['success'], $actualPayloadResponse->isSuccess());
        $this->assertEquals($responseData['statsDuration'], $actualPayloadResponse->getStatsDuration());
        $this->assertEquals($responseData['requestNumber'], $actualPayloadResponse->getRequestNumber());
        $this->assertResponse($responseData, $actualPayloadResponse);
    }

    /**
     * Compares the expected response data against the values returned by the actual Response's methods
     *
     * @param array                    $responseData
     * @param PayloadResponseInterface $payloadResponse
     */
    abstract protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse);

    /**
     * Returns the response class used for this test-case
     * Can be overwritten if it deviates from the standard pattern
     */
    protected function getResponseClass()
    {
        $class = get_class($this);
        $name  = substr($class, strripos($class, '\\') + 1, -4);

        return sprintf('Colada\Europeana\Payload\%s', $name);
    }

    /**
     * Returns the data used for comparison against the actual Response class
     *
     * @return array
     */
    abstract public function createResponseData();
}
