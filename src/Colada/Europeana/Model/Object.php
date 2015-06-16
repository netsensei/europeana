<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Model;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Object extends AbstractModel
{
    /**
     * @var string
     */
    private $about;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\Agent>
     */
    # private $agents;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\Aggregation>
     */
    private $aggregations;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\Concept>
     */
    private $concepts;

    /**
     * @var ArrayCollection<string>
     */
    # private $country;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\EuropeanaAggregation>
     */
    private $europeanaAggregation;

    /**
     * @var ArrayCollection<string>
     */
    private $europeanaCollectionName;

    /**
     * @var integer
     */
    private $europeanaCompleteness;

    /**
     * @var ArrayCollection<string>
     */
    # private $language;

    /**
     * @var bool
     */
    private $optOut;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\Place>
     */
    # private $places;

    /**
     * @var ArrayCollection<string>
     */
    #private $provider;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\ProvidedCHO>
     */
    private $providedCHOs;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\Proxy>
     */
    private $proxies;

    /**
     * @var ArrayCollection<Colada\Europeana\Model\EDM\Timespan>
     */
    # private $timespans;

    /**
     * @var integer
     */
    private $timestamp_created_epoch;

    /**
     * @var integer
     */
    private $timestamp_update_epoch;

    /**
     * @var string
     */
    private $timestamp_created;

    /**
     * @var string
     */
    private $timestamp_update;

    /**
     * @var ArrayCollection<string>
     */
    private $title;

    /**
     * @var string
     */
    private $type;

    /**
     * @var ArrayCollection<string>
     */
    # private $year;

    public function getAbout()
    {
        return $this->about;
    }

    public function getAgents()
    {
        return $this->agents;
    }

    public function getAggregations()
    {
        return $this->aggregations;
    }

    public function getConcepts()
    {
        return $this->concepts;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getEuropeanaAggregation()
    {
        return $this->europeanaAggregation;
    }

    public function getEuropeanaCollectionName()
    {
        return $this->europeanaCollectionName;
    }

    public function getEuropeanaCompleteness()
    {
        return $this->europeanaCompleteness;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getOptOut()
    {
        return $this->optOut;
    }

    public function getPlaces()
    {
        return $this->places;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function getProvidedCHOs()
    {
        return $this->providedCHOs;
    }

    public function getProxies()
    {
        return $this->proxies;
    }

    public function getTimespans()
    {
        return $this->timespans;
    }

    public function getTimestampCreatedEpoch()
    {
        return $this->timestamp_created_epoch;
    }

    public function getTimestampUpdateEpoch()
    {
        return $this->timestamp_update_epoch;
    }

    public function getTimestampCreated()
    {
        return $this->timestamp_created;
    }

    public function getTimestampUpdate()
    {
        return $this->timestamp_update;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }
}
