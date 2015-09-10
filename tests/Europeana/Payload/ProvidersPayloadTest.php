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

use Colada\Europeana\Payload\ProvidersPayload;
use Colada\Europeana\Payload\PayloadInterface;
use Colada\Europeana\Payload\PayloadHandlerFactory;
use Colada\Europeana\Exception\EuropeanaException;

class ProvidersPayloadTest extends AbstractPayloadTest
{
    protected function createPayload()
    {
        $payload = new ProvidersPayload();

        $payload->setOffset('10');
        $payload->setPageSize(10);
        $payload->setCountryCode('be');

        return $payload;
    }

    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return array(
            array('offset', '10'),
            array('pagesize', 10),
            array('countryCode', 'be'),
        );
    }

    public function testPayloadValidation()
    {
        $payload = new ProvidersPayload();

        try {
            $payload->setPageSize('abc');
        } catch (EuropeanaException $e) {
            $previous = $e->getPrevious();
            $this->assertInstanceOf('\InvalidArgumentException', $previous);
            $this->assertEquals(
                            'Expected argument to be of type "integer", got "string"',
                            $previous->getMessage()
                    );
            return;
        }

        $this->markTestIncomplete('This test should have thrown an exception');
    }

    // @todo
    // Test validation / Exception handling / Required params / etc.
}
