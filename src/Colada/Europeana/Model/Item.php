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
class Item
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
    function getDataProvider() {
        return $this->dataProvider;
    }

    function getDcCreator() {
        return $this->dcCreator;
    }

    function getEdmIsShownAt() {
        return $this->edmIsShownAt;
    }

    function getEdmPlaceLatitude() {
        return $this->edmPlaceLatitude;
    }

    function getEdmPlaceLongitude() {
        return $this->edmPlaceLongitude;
    }

    function getEdmPreview() {
        return $this->edmPreview;
    }

    function getEuropeanaCompleteness() {
        return $this->europeanaCompleteness;
    }

    function getGuid() {
        return $this->guid;
    }

    function getId() {
        return $this->id;
    }

    function getLink() {
        return $this->link;
    }

    function getProvider() {
        return $this->provider;
    }

    function getRights() {
        return $this->rights;
    }

    function getScore() {
        return $this->score;
    }

    function getTitle() {
        return $this->title;
    }

    function getType() {
        return $this->type;
    }

    function getYear() {
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

    function getEdmTimespanLabel() {
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

    function getUgc() {
        return $this->ugc;
    }

    function getCompleteness() {
        return $this->completeness;
    }

    /* function getCountry() {
        return $this->country;
    } */

    function getEuropeanaCollectionName() {
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

    function getLanguage() {
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

    function getEdmAgent() {
        return $this->edmAgent;
    }

    function getEdmAgentLabel() {
        return $this->edmAgentLabel;
    }

    function getDcContributor() {
        return $this->dcContributor;
    }

    // Rich Portal
    function getEdmIsShownBy() {
        return $this->edmIsShownBy;
    }

    function getDcDescription() {
        return $this->dcDescription;
    }

    function getEdmLandingPage() {
        return $this->edmLandingPage;
    }

    // Ungrouped
    function getEdmConceptLabel() {
        return $this->edmConceptLabel;
    }

    function getTimestampCreatedEpoch() {
        return $this->timestamp_created_epoch;
    }

    function getTimestampUpdateEpoch() {
        return $this->timestamp_update_epoch;
    }

    function getTimestampCreated() {
        return $this->timestamp_created;
    }

    function getTimestampUpdate() {
        return $this->timestamp_update;
    }

    function getIndex() {
        return $this->index;
    }

    function getDcLanguage() {
        return $this->dcLanguage;
    }
}
