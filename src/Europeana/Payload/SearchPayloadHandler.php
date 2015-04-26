<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Payload;

use Europeana\Payload\AbstractPayloadHandler;

class SearchPayloadHandler extends AbstractPayloadHandler
{
    public function get()
    {
        $payload = $this->getPayload();

        $arguments[] = array('query', $payload->getQuery());

        if ($profiles = $payload->getProfiles()) {
            $arguments[] = array('profile', implode(' ', $profiles));
        }

        if ($reusability = $payload->getReusability()) {
            $arguments[] = array('reusability', $reusability);
        }

        if ($facets = $payload->getFacets()) {
            $facetNames = [];
            foreach ($payload->getFacets() as $facet) {
                $facetNames[] = $facet->getName();

                if ($limit = $facet->getLimit()) {
                    $arguments[] = array('f.' . $facet->getName() . '.facet.limit', $limit);
                }
                if ($offset = $facet->getOffset()) {
                    $arguments[] = array('f.' . $facet->getName() . '.facet.offset', $offset);
                }
            }
            $arguments[] = array('facet', implode(',', $facetNames));
        }

        if ($rows = $payload->getRows()) {
            $arguments[] = array('rows', $rows);
        }

        if ($start = $payload->getStart()) {
            $arguments[] = array('start', $start);
        }

        return $arguments;
    }
}
