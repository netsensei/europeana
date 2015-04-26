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
use Europeana\Payload\Facet\Facet;

class SearchPayloadFacetsTest extends AbstractPayloadTest
{
    protected function createPayload()
    {
        $payload = new SearchPayload();

        $payload->setQuery('foo bar');

        $facet = new Facet('PROVIDER', 10, 20);
        $payload->addFacet($facet);

        $facet = new Facet('proxy_dc_coverage', 10, 20);
        $payload->addFacet($facet);

        $facet = new Facet('proxy_dc_contributor', 10, 20);
        $payload->addFacet($facet);

        return $payload;
    }

    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return array(
            array('query', 'foo bar'),
            array('f.PROVIDER.facet.limit', 10),
            array('f.PROVIDER.facet.offset', 20),
            array('f.proxy_dc_coverage.facet.limit', 10),
            array('f.proxy_dc_coverage.facet.offset', 20),
            array('f.proxy_dc_contributor.facet.limit', 10),
            array('f.proxy_dc_contributor.facet.offset', 20),
            array('facet', 'PROVIDER,proxy_dc_coverage,proxy_dc_contributor')
        );
    }

    // @todo
    // Test validation / Exception handling / Required params / etc.
}
