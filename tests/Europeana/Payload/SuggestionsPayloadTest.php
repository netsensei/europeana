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

use Colada\Europeana\Payload\SuggestionsPayload;
use Colada\Europeana\Payload\PayloadInterface;
use Colada\Europeana\Exception\EuropeanaException;

class SuggestionsPayloadTest extends AbstractPayloadTest
{
    protected function createPayload()
    {
        $payload = new SuggestionsPayload();

        $payload->setQuery('foo bar');
        $payload->setRows(10);

        return $payload;
    }

    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return array(
            array('query', 'foo bar'),
            array('rows', 10),
        );
    }

    public function testPayloadValidation()
    {
        $payload = new SuggestionsPayload();

        try {
            $payload->setRows('abc');
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
