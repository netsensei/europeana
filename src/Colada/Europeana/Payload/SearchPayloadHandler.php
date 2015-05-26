<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Payload;

use Colada\Europeana\Payload\AbstractPayloadHandler;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class SearchPayloadHandler extends AbstractPayloadHandler
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        $payload = $this->getPayload();

        $arguments[] = array('query', $payload->getQuery());

        foreach ($payload->getRefinements() as $refinement) {
            $qf = $refinement->getName() . ':' . $refinement->getValue();
            $arguments[] = array('qf', $qf);
        }

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
