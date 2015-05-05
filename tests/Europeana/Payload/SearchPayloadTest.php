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
            array('start', 1)
        );
    }

    // @todo
    // Test validation / Exception handling / Required params / etc.
}
