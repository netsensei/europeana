<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Tests\Payload;

use Europeana\Payload\PayloadInterface;
use Europeana\Payload\PayloadHandlerFactory;

abstract class AbstractPayloadTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    public function testPayload()
    {
        $payload = $this->createPayload();

        $this->assertInternalType('string', $payload->getMethod());
        $this->assertTrue(class_exists($payload->getResponseClass()));
        $this->assertTrue(class_exists($payload->getHandlerClass()));

        $handler = PayloadHandlerFactory::getHandler($payload);
        $actualData = $handler->get();
        $expectedData = $this->getExpectedPayloadData($payload);

        $this->assertEquals($expectedData, $actualData);
    }

    /**
     * @return PayloadInterface
     */
    abstract protected function createPayload();

    /**
     * @param PayloadInterface $payload
     *
     * @return array
     */
    abstract protected function getExpectedPayloadData(PayloadInterface $payload);
}
