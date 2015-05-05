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
use Colada\Europeana\Payload\Facet\Facet;
use Colada\Europeana\Payload\Facet\Refinement;

class SearchPayloadFacetsTest extends AbstractPayloadTest
{
    protected function createPayload()
    {
        $payload = new SearchPayload();

        $payload->setQuery('foo bar');

        $refinement = new Refinement('TYPE', 'IMAGE');
        $payload->addRefinement($refinement);

        $refinement = new Refinement('where', 'france');
        $payload->addRefinement($refinement);

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
            array('qf', 'TYPE:IMAGE'),
            array('qf', 'where:france'),
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
