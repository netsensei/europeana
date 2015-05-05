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

use Colada\Europeana\Enum\Reusability;
use Colada\Europeana\Enum\Profile;
use Colada\Europeana\Exception\EuropeanaException;
use Colada\Europeana\Payload\Facet\FacetInterface;
use Colada\Europeana\Payload\Facet\RefinementInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class SearchPayload extends AbstractPayload
{
    private $query;

    private $refinements = [];

    private $rows;

    private $start;

    private $reusability;

    private $facets = [];

    private $profiles = [];

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function addRefinement(RefinementInterface $refinement)
    {
        $this->refinements[$refinement->getName()] = $refinement;
    }

    public function getRefinements()
    {
        return $this->refinements;
    }

    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setReusability($reusability)
    {
        try {
            Reusability::assertExists($reusability);
            $this->reusability = $reusability;
        } catch (\Exception $e) {
            throw new EuropeanaException('Failed to prepare payload', null, $e);
        }
    }

    public function getReusability()
    {
        return $this->reusability;
    }

    public function addFacet(FacetInterface $facet)
    {
        $this->facets[$facet->getName()] = $facet;
    }

    public function getFacets()
    {
        return $this->facets;
    }

    public function addProfile($profile)
    {
        try {
            Profile::assertExists($profile);
            if (!in_array($profile, $this->profiles)) {
                $this->profiles[] = $profile;
            }
        } catch (\Exception $e) {
            throw new EuropeanaException('Failed to prepare payload', null, $e);
        }
    }

    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'search.json';
    }
}