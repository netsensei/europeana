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

use Europeana\Payload\SearchPayload;
use Europeana\Payload\PayloadInterface;

class SearchPayloadTest extends AbstractPayloadTest
{
    protected function createPayload()
    {
        $payload = new SearchPayload();
        $payload->setQuery('bar');
        $payload->addProfile('foo');
        return $payload;
    }

    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return array(
            array('query', 'bar'),
            array('profile', 'foo')
        );
    }
}
