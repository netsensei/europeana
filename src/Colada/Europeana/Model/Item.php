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
class Item extends AbstractModel
{
    // Minimal Profile
    private $dataProvider;

    private $dcCreator;

    private $edmIsShownAt;

    private $edmPlaceLatitude;

    private $edmPlaceLongitude;

    private $edmPreview;

    private $europeanaCompleteness;

    private $guid;

    private $id;

    private $link;

    private $provider;

    private $rights;

    private $score;

    private $title;

    private $type;

    private $year;

    // Standard Profile
    //private $edmConceptTerm;

    //private $edmConceptPrefLabel;

    //private $edmConceptBroaderTerm;

    //private $edmConceptBroaderLabel;

    private $edmTimespanLabel;

    //private $edmTimespanBegin;

    //private $edmTimespanEnd;

    //private $edmTimespanBroaderTerm;

    //private $edmTimespanBroaderLabel;

    //private $recordHashFirstSix;

    private $ugc;

    private $completeness;

    //private $country;

    private $europeanaCollectionName;

    //private $edmPlaceBroaderTerm;

    //private $edmPlaceAltLabel;

    //private $dctermsIsPartOf;

    //private $timestampCreated;

    //private $timestampUpdate;

    private $language;

    // Portal Profile
    //private $dctermsSpatial;

    //private $edmPlace;

    //private $edmTimespan;

    private $edmAgent;

    private $edmAgentLabel;

    private $dcContributor;

    // Rich Portal
    private $edmIsShownBy;

    private $dcDescription;

    private $edmLandingPage;

    // Ungrouped
    private $edmConceptLabel;

    private $timestamp_created_epoch;

    private $timestamp_update_epoch;

    private $timestamp_created;

    private $timestamp_update;

    private $index;

    private $dcLanguage;

    // Minimal Profile
    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    public function getDcCreator()
    {
        return $this->dcCreator;
    }

    public function getEdmIsShownAt()
    {
        return $this->edmIsShownAt;
    }

    public function getEdmPlaceLatitude()
    {
        return $this->edmPlaceLatitude;
    }

    public function getEdmPlaceLongitude()
    {
        return $this->edmPlaceLongitude;
    }

    public function getEdmPreview()
    {
        return $this->edmPreview;
    }

    public function getEuropeanaCompleteness()
    {
        return $this->europeanaCompleteness;
    }

    public function getGuid()
    {
        return $this->guid;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function getRights()
    {
        return $this->rights;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getYear()
    {
        return $this->year;
    }

    // Standard Profile
    /* function getEdmConceptTerm() {
        return $this->edmConceptTerm;
    } */

    /* function getEdmConceptPrefLabel() {
        return $this->edmConceptPrefLabel;
    } */

    /* function getEdmConceptBroaderTerm() {
        return $this->edmConceptBroaderTerm;
    } */

    /* function getEdmConceptBroaderLabel() {
        return $this->edmConceptBroaderLabel;
    } */

    public function getEdmTimespanLabel()
    {
        return $this->edmTimespanLabel;
    }

    /* function getEdmTimespanBegin() {
        return $this->edmTimespanBegin;
    } */

    /* function getEdmTimespanEnd() {
        return $this->edmTimespanEnd;
    } */

    /* function getEdmTimespanBroaderTerm() {
        return $this->edmTimespanBroaderTerm;
    } */

    /* function getEdmTimespanBroaderLabel() {
        return $this->edmTimespanBroaderLabel;
    } */

    /* function getRecordHashFirstSix() {
        return $this->recordHashFirstSix;
    } */

    public function getUgc()
    {
        return $this->ugc;
    }

    public function getCompleteness()
    {
        return $this->completeness;
    }

    /* function getCountry() {
        return $this->country;
    } */

    public function getEuropeanaCollectionName()
    {
        return $this->europeanaCollectionName;
    }

    /* function getEdmPlaceBroaderTerm() {
        return $this->edmPlaceBroaderTerm;
    } */

    /* function getEdmPlaceAltLabel() {
        return $this->edmPlaceAltLabel;
    } */

    /* function getDctermsIsPartOf() {
        return $this->dctermsIsPartOf;
    } */

    /* function getTimestampCreated() {
        return $this->timestampCreated;
    } */

    /* function getTimestampUpdate() {
        return $this->timestampUpdate;
    } */

    public function getLanguage()
    {
        return $this->language;
    }

    // Portal Profile
    /* function getDctermsSpatial() {
        return $this->dctermsSpatial;
    } */

    /* function getEdmPlace() {
        return $this->edmPlace;
    } */

    /* function getEdmTimespan() {
        return $this->edmTimespan;
    } */

    public function getEdmAgent()
    {
        return $this->edmAgent;
    }

    public function getEdmAgentLabel()
    {
        return $this->edmAgentLabel;
    }

    public function getDcContributor()
    {
        return $this->dcContributor;
    }

    // Rich Portal
    public function getEdmIsShownBy()
    {
        return $this->edmIsShownBy;
    }

    public function getDcDescription()
    {
        return $this->dcDescription;
    }

    public function getEdmLandingPage()
    {
        return $this->edmLandingPage;
    }

    // Ungrouped
    public function getEdmConceptLabel()
    {
        return $this->edmConceptLabel;
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

    public function getIndex()
    {
        return $this->index;
    }

    public function getDcLanguage()
    {
        return $this->dcLanguage;
    }
}
