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

use Colada\Europeana\Payload\SearchPayload;
use Colada\Europeana\Payload\PayloadInterface;
use Colada\Europeana\Exception\EuropeanaException;

class SearchPayloadTest extends AbstractPayloadTest
{
    protected function createPayload()
    {
        $payload = new SearchPayload();

        $payload->setQuery('foo bar');
        $payload->addProfile('rich');
        $payload->addProfile('facets');
        $payload->addProfile('breadcrumbs');
        $payload->addProfile('params');
        $payload->setReusability('open');
        $payload->setRows(10);
        $payload->setStart(1);

        return $payload;
    }

    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return array(
            array('query', 'foo bar'),
            array('profile', 'rich facets breadcrumbs params'),
            array('reusability', 'open'),
            array('rows', 10),
            array('start', 1),
        );
    }

    public function testPayloadValidation()
    {
        $payload = new SearchPayload();

        try {
            $payload->setRows('abc');
        } catch (EuropeanaException $e) {
            $previous = $e->getPrevious();
            $this->assertInstanceOf('\InvalidArgumentException', $previous);
            $this->assertEquals(
                            'Expected argument to be of type "integer", got "string"',
                            $previous->getMessage()
                    );
        }

        try {
            $payload->setStart('abc');
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
