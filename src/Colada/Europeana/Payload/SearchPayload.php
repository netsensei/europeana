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
    /**
     * @var string
     */
    private $query;

    /**
     * @var array
     */
    private $refinements = [];

    /**
     * @var int
     */
    private $rows;

    /**
     * @var int
     */
    private $start;

    /**
     * @var string
     */
    private $reusability;

    /**
     * @var boolean
     */
    private $media;

    /**
     * @var array
     */
    private $facets = [];

    /**
     * @var array
     */
    private $profiles = [];

    /**
     * Set the query parameter.
     *
     * The query is a string following a lucene-like syntax as
     * defined in the API documentation.
     *
     * @link http://labs.europeana.eu/api/query/
     *
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * Returns the set query
     *
     * @return string|null
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Add a refinement to the query.
     *
     * A refinement is an abstraction of the qf parameter. Multiple 'qf' key/
     * value pairs can be added to the request.
     *
     * @link http://labs.europeana.eu/api/query/#refinements
     *
     * @param RefinementInterface $refinement
     */
    public function addRefinement(RefinementInterface $refinement)
    {
        $this->refinements[$refinement->getName()] = $refinement;
    }

    /**
     * Returns all the defined refinements for this request object.
     *
     * @return array
     */
    public function getRefinements()
    {
        return $this->refinements;
    }

    /**
     * Set the rows parameter
     *
     * @param int
     */
    public function setRows($rows)
    {
        try {
            if (!is_numeric($rows)) {
                throw new \InvalidArgumentException(sprintf(
                    'Expected argument to be of type "integer", got "%s"',
                    gettype($rows)
                ));
            }
            $this->rows = $rows;
        } catch (\InvalidArgumentException $e) {
            throw new EuropeanaException('Failed to prepare payload', null, $e);
        }
    }

    /**
     * Returns the rows parameter value
     *
     * @param int|null
     */
    public function getRows()
    {
        return $this->rows;
    }

    public function setStart($start)
    {
        try {
            if (!is_numeric($start)) {
                throw new \InvalidArgumentException(sprintf(
                    'Expected argument to be of type "integer", got "%s"',
                    gettype($start)
                ));
            }
            $this->start = $start;
        } catch (\InvalidArgumentException $e) {
            throw new EuropeanaException('Failed to prepare payload', null, $e);
        }
    }

    /**
     * Returns the start parameter value
     *
     * @param int|null
     */
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

    /**
     * Returns the reusability parameter value
     *
     * @param int|null
     */
    public function getReusability()
    {
        return $this->reusability;
    }

    /**
     * Set the media flag
     *
     * @param int
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * Returns the media parameter value
     *
     * @param int
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Add a new facet to the query.
     *
     * @param FacetInterface $facet
     */
    public function addFacet(FacetInterface $facet)
    {
        $this->facets[$facet->getName()] = $facet;
    }

    /**
     * Returns the facets parameter value.
     *
     * @return array
     */
    public function getFacets()
    {
        return $this->facets;
    }

    /**
     * Add a new profile to the query.
     *
     * A profile is string value. There are limited number of
     * valid string values:
     *
     *  - minimal
     *  - standard
     *  - rich
     *  - facets
     *  - breadcrumbs
     *  - params
     *  - portal
     *
     * Other values wil throw an exception.
     *
     * @param string
     *
     * @throws EuropeanaException
     */
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

    /**
     * Returns the profiles parameter value
     *
     * @param array
     */
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
