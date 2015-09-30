<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Tests;

use Colada\Europeana\Model\Search\Breadcrumb;
use Colada\Europeana\Model\Search\Facet;
use Colada\Europeana\Model\Search\Item as SearchItem;
use Colada\Europeana\Model\Params;
use Colada\Europeana\Model\Record\Object;
use Colada\Europeana\Model\EDM\Aggregation;
use Colada\Europeana\Model\EDM\Label;
use Colada\Europeana\Model\EDM\LangMap;
use Colada\Europeana\Model\EDM\WebResource;
use Colada\Europeana\Model\Datasets\Item as DatasetItem;
use Colada\Europeana\Model\Providers\Item as ProviderItem;
use Colada\Europeana\Model\Suggestions\Item as SuggestionItem;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    protected function createItem()
    {
        return [
            // Minimal Profile
            'dataProvider'            => ['provider one', 'provider two'],
            'dcCreator'               => ['creator one'],
            'edmIsShownAt'            => ['http://example.com/isshownat'],
            'edmPlaceLatitude'        => ['48.85341'],
            'edmPlaceLongitude'       => ['2.3488'],
            'edmPreview'              => ['http://example.com/representation'],
            'europeanaCompleteness'   => 1,
            'guid'                    => 'guid',
            'id'                      => 'europeana_id',
            'link'                    => 'http://example.com/object',
            'provider'                => ['provider'],
            'rights'                  => ['http://example.com/rights'],
            'score'                   => '9.9999990',
            'title'                   => ['title', 'alternative'],
            'type'                    => 'IMAGE',
            'year'                    => ['1798', '1800'],

            // Standard Profile
            //'edmConceptTerm'          => [''],
            //'edmConceptPrefLabel'     => [''],
            //'edmConceptBroaderTerm'   => [''],
            //'edmConceptBroaderLabel'  => [''],
            'edmTimespanLabel'        => [['def' => '20th'], ['def' => 'Early 20th Century']],
            //'edmTimespanBegin'        => [''],
            //'edmTimespanEnd'          => [''],
            //'edmTimespanBroaderTerm'  => [''],
            //'edmTimespanBroaderLabel' => [''],
            //'recordHashFirstSix'      => [''],
            //'ugc'                     => [true],
            'completeness'            => 7,
            //'country'               => [''],
            'europeanaCollectionName' => ['collection one', 'collection two'],
            //'edmPlaceBroaderTerm'     => [''],
            //'edmPlaceAltLabel'        => '',
            //'dctermsIsPartOf'         => [''],
            //'timestampCreated'        => [''],
            //'timestampUpdate'         => [''],
            'language'                => ['fr', 'en'],

            // Portal Profile
            //'dctermsSpatial'          => [''],
            'edmPlace'                => ['http://example.com/edmplace'],
            //'edmTimespan'             => ['http://example.com/edmTimespan'],
            'edmAgent'                => ['http://example.com/edmAgent'],
            'edmAgentLabel'           => [['def' => 'foto'], ['def' => 'photograph']],
            'dcContributor'           => ['contributor'],

            // Rich Portal
            'edmIsShownBy'            => ['http://example.com/shownby'],
            'dcDescription'           => ['description'],
            'edmLandingPage'          => ['http://example.com/landingpage'],

            // Ungrouped
            'edmConceptLabel'         => [['def' => 'foto'], ['def' => 'photograph']],
            'timestamp_created_epoch' => 1234567890000,
            'timestamp_update_epoch'  => 1234567890000,
            'timestamp_created'       => '2014-10-28T17:19:12.461Z',
            'timestamp_update'        => '2014-10-28T17:19:12.461Z',
            'index'                   => 1,
            'dcLanguage'              => ['foo bar'],
        ];
    }

    protected function assertItem(array $expected, SearchItem $actual)
    {
        $this->assertLabel($expected['edmTimespanLabel'][0], $actual->getEdmTimespanLabel()->get(0));
        unset($expected['edmTimespanLabel']);

        $this->assertLabel($expected['edmAgentLabel'][0], $actual->getEdmAgentLabel()->get(0));
        unset($expected['edmAgentLabel']);

        $this->assertLabel($expected['edmConceptLabel'][0], $actual->getEdmConceptLabel()->get(0));
        unset($expected['edmConceptLabel']);

        $this->assertEquals($expected, [
            // Minimal Profile
            'dataProvider'             => $actual->getDataProvider()->toArray(),
            'dcCreator'                => $actual->getDcCreator()->toArray(),
            'edmIsShownAt'             => $actual->getEdmIsShownAt()->toArray(),
            'edmPlaceLatitude'         => $actual->getEdmPlaceLatitude()->toArray(),
            'edmPlaceLongitude'        => $actual->getEdmPlaceLongitude()->toArray(),
            'edmPreview'               => $actual->getEdmPreview()->toArray(),
            'europeanaCompleteness'    => $actual->getEuropeanaCompleteness(),
            'guid'                     => $actual->getGuid(),
            'id'                       => $actual->getId(),
            'link'                     => $actual->getLink(),
            'provider'                 => $actual->getProvider()->toArray(),
            'rights'                   => $actual->getRights()->toArray(),
            'score'                    => $actual->getScore(),
            'title'                    => $actual->getTitle()->toArray(),
            'type'                     => $actual->getType(),
            'year'                     => $actual->getYear()->toArray(),

            // Standard Profile
            //'edmConceptTerm'          => $actual->getEdmConceptTerm(),
            //'edmConceptPrefLabel'     => $actual->getEdmConceptPrefLabel(),
            //'edmConceptBroaderTerm'   => $actual->getEdmConceptBroaderTerm(),
            //'edmConceptBroaderLabel'  => $actual->getEdmConceptBroaderLabel(),
            //'edmTimespanLabel'        => $actual->getEdmTimespanLabel()->toArray(),
            //'edmTimespanBegin'        => $actual->getEdmTimespanBegin(),
            //'edmTimespanEnd'          => $actual->getEdmTimespanEnd(),
            //'edmTimespanBroaderTerm'  => $actual->getEdmTimespanBroaderTerm(),
            //'edmTimespanBroaderLabel' => $actual->getEdmTimespanBroaderLabel(),
            //'recordHashFirstSix'      => $actual->getRecordHashFirstSix(),
            //'ugc'                     => $actual->getUgc()->toArray(),
            'completeness'            => $actual->getCompleteness(),
            //'country'                 => $actual->getCountry(),
            'europeanaCollectionName' => $actual->getEuropeanaCollectionName()->toArray(),
            //'edmPlaceBroaderTerm'     => $actual->getEdmPlaceBroaderTerm(),
            //'edmPlaceAltLabel'        => $actual->getEdmPlaceAltLabel(),
            //'dctermsIsPartOf'         => $actual->getDctermsIsPartOf(),
            //'timestampCreated'        => $actual->getTimestampCreated(),
            //'timestampUpdate'         => $actual->getTimestampUpdate(),
            'language'                => $actual->getLanguage()->toArray(),

            // Portal Profile
            //'dctermsSpatial'           => $actual->getDctermsSpatial(),
            'edmPlace'                => $actual->getEdmPlace()->toArray(),
            //'edmTimespan'              => $actual->getEdmTimespan(),
            'edmAgent'                => $actual->getEdmAgent()->toArray(),
            'dcContributor'           => $actual->getDcContributor()->toArray(),

            // Rich Portal
            'edmIsShownBy'            => $actual->getEdmIsShownBy()->toArray(),
            'dcDescription'           => $actual->getDcDescription()->toArray(),
            'edmLandingPage'          => $actual->getEdmLandingPage()->toArray(),

            // Ungrouped
            'timestamp_created_epoch' => $actual->getTimestampCreatedEpoch(),
            'timestamp_update_epoch'  => $actual->getTimestampUpdateEpoch(),
            'timestamp_created'       => $actual->getTimestampCreated(),
            'timestamp_update'        => $actual->getTimestampUpdate(),
            'index'                   => $actual->getIndex(),
            'dcLanguage'              => $actual->getDcLanguage()->toArray(),
        ]);
    }

    protected function createLabel()
    {
        return [
            'def' => 'foo',
        ];
    }

    protected function assertLabel(array $expected, Label $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\EDM\Label', $actual);
        $this->assertEquals($expected, [
            'def' => $actual->getDef()
        ]);
    }

    protected function createFacet()
    {
        return [
            'name' => 'foo',
            'fields' => [
                [
                    ['label' => 'value'],
                    ['count' => 123],
                ],
            ]
        ];
    }

    protected function assertFacet(array $expected, Facet $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\Search\Facet', $actual);
        $this->assertEquals($expected, [
            'name'      => $actual->getName(),
            'fields'    => $actual->getFields()->toArray()
        ]);
    }

    protected function createBreadcrumb()
    {
        return [
            'display'    => 'foobar',
            'href'       => 'query=foobar',
            'param'      => 'query',
            'value'      => 'foobar',
            'last'       => true
        ];
    }

    protected function assertBreadcrumb(array $expected, Breadcrumb $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\Search\Breadcrumb', $actual);
        $this->assertEquals($expected, [
            'display'      => $actual->getDisplay(),
            'href'         => $actual->getHref(),
            'param'        => $actual->getParam(),
            'value'        => $actual->getValue(),
            'last'         => $actual->getLast()
        ]);
    }

    protected function createParams()
    {
        return [
            'query'     => 'query',
            'qf'        => 'where:place',
            'profiles'  => 'foo bar',
            'start'     => 1,
            'rows'      => 12
        ];
    }

    protected function assertParams(array $expected, Params $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\Params', $actual);
        $this->assertEquals($expected, [
            'query'        => $actual->getQuery(),
            'qf'           => $actual->getRefinements(),
            'profiles'     => $actual->getProfiles(),
            'start'        => $actual->getStart(),
            'rows'         => $actual->getRows(),
        ]);
    }

    protected function createSuggestionsItem()
    {
        return [
            'term'          => 'paris',
            'frequency'     => 1234,
            'field'         => 'fieldname',
            'query'         => 'where:paris'
        ];
    }

    protected function assertSuggestionsItem(array $expected, SuggestionItem $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\Suggestions\Item', $actual);
        $this->assertEquals($expected, [
            'term'          => $actual->getTerm(),
            'frequency'     => $actual->getFrequency(),
            'field'         => $actual->getField(),
            'query'         => $actual->getQuery()
        ]);
    }

    protected function createObject()
    {
        return [
            'about'                     => '/europeana/id',
            'agents'                    => [$this->createAgent()],
            'aggregations'              => [$this->createAggregation()],
            'concepts'                  => [$this->createConcept()],
            // 'country'                =>
            'europeanaAggregation'      => $this->createEuropeanaAggregation(),
            'europeanaCollectionName'   => ['test'],
            'europeanaCompleteness'     => 1,
            // 'language'               =>
            'optOut'                    => 1,
            'places'                    => [$this->createPlace()],
            // 'provider'               =>
            'providedCHOs'              => [$this->createProvidedCHO()],
            'proxies'                   => [$this->createProxy()],
            'timespans'                 => [$this->createTimespan()],
            'timestamp_created_epoch'   => 1234567890000,
            'timestamp_update_epoch'    => 1234567890000,
            'timestamp_created'         => '2014-10-28T17:19:12.461Z',
            'timestamp_update'          => '2014-10-28T17:19:12.461Z',
            'title'                     => ['title', 'alternative'],
            'type'                      => 'IMAGE',
        ];
    }

    protected function assertObject(array $expected, Object $actual)
    {
        $this->assertAggregation($expected['aggregations'][0], $actual->getAggregations()->first());
        unset($expected['aggregations']);
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\Record\Object', $actual);
        $this->assertEquals($expected, [
            'about'                     => $actual->getAbout(),
            'agents'                    => [$this->createAgent()],
            'concepts'                  => [$this->createConcept()],
            'europeanaAggregation'      => $this->createEuropeanaAggregation(),
            'europeanaCollectionName'   => $actual->getEuropeanaCollectionName()->toArray(),
            'europeanaCompleteness'     => $actual->getEuropeanaCompleteness(),
            // 'language'               =>
            'optOut'                    => $actual->getOptOut(),
            'places'                    => [$this->createPlace()],
            // 'provider'               =>
            'providedCHOs'              => [$this->createProvidedCHO()],
            'proxies'                   => [$this->createProxy()],
            'timespans'                 => [$this->createTimespan()],
            'timestamp_created_epoch'   => $actual->getTimestampCreatedEpoch(),
            'timestamp_update_epoch'    => $actual->getTimestampUpdateEpoch(),
            'timestamp_created'         => $actual->getTimestampCreated(),
            'timestamp_update'          => $actual->getTimestampUpdate(),
            'title'                     => $actual->getTitle()->toArray(),
            'type'                      => $actual->getType(),
        ]);
    }

    protected function createAgent()
    {
        return [];
    }

    // protected function assertAgent(array $expected, Agent $agent)
    // {
    // }

    protected function createAggregation()
    {
        return [
            'about'                     => '/europeana/id',
            'edmDataProvider'           => $this->createLangmap(),
            'edmIsShownBy'              => 'http://example.com/isshownby',
            'edmIsShownAt'              => 'http://example.com/isshownat',
            'edmObject'                 => 'object',
            'edmProvider'               => $this->createLangmap(),
            'edmRights'                 => $this->createLangmap(),
            'edmUgc'                    => 'test',
            'dcRights'                  => $this->createLangmap(),
            'hasView'                   => ['view'],
            'aggregatedCHO'             => 'test',
            'aggregates'                => ['aggregates'],
            'webResources'              => [$this->createWebResource()]
        ];
    }

    protected function assertAggregation(array $expected, Aggregation $actual)
    {
        $this->assertLangmap($expected['edmDataProvider'], $actual->getEdmDataProvider());
        unset($expected['edmDataProvider']);
        $this->assertLangmap($expected['edmProvider'], $actual->getEdmProvider());
        unset($expected['edmProvider']);
        $this->assertLangmap($expected['edmRights'], $actual->getEdmRights());
        unset($expected['edmRights']);
        $this->assertLangmap($expected['dcRights'], $actual->getDcRights());
        unset($expected['dcRights']);
        $this->assertWebResource($expected['webResources'][0], $actual->getWebResources()->first());
        unset($expected['webResources']);
        $this->assertInstanceOf('Colada\Europeana\Model\EDM\Aggregation', $actual);
        $this->assertEquals($expected, [
            'about'                     => $actual->getAbout(),
            'edmIsShownBy'              => $actual->getEdmIsShownBy(),
            'edmIsShownAt'              => $actual->getEdmIsShownAt(),
            'edmObject'                 => $actual->getEdmObject(),
            'edmUgc'                    => $actual->getEdmUgc(),
            'hasView'                   => $actual->getHasView()->toArray(),
            'aggregatedCHO'             => $actual->getAggregatedCHO(),
            'aggregates'                => $actual->getAggregates()->toArray(),
        ]);
    }

    protected function createConcept()
    {
        return [];
    }

    // protected function assertConcept(array $expected, Concept $concept)
    // {
    // }

    protected function createEuropeanaAggregation()
    {
        return [];
    }

    // protected function assertEuropeanaAggregation(array $expected, EuropeanaAggregation $europeanaAggregation)
    // {
    // }

    protected function createPlace()
    {
        return [];
    }

    // protected function assertPlace(array $expected, Place $place)
    // {
    // }

    protected function createProvidedCHO()
    {
        return [];
    }

    // protected function assertProvidedCHO(array $expected, ProvidedCHO $providedCHO)
    // {
    // }

    protected function createProxy()
    {
        return [];
    }

    // protected function assertProxy(array expected, Proxy $proxy)
    // {
    // }

    protected function createTimespan()
    {
        return [];
    }

    // protected function asserTimespan(array $expected, Timespan $timespan)
    // {
    // }

    protected function createLangmap()
    {
        return [
            'en'    => 'en_foobar',
            'def'   => 'def_foobar',
            'fr'    => 'fr_foobar'
        ];
    }

    protected function assertLangmap(array $expected, Langmap $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\EDM\LangMap', $actual);
        $this->assertEquals($expected, $actual->all());
        $this->assertEquals('en_foobar', $actual->get('en'));
        $this->assertEmpty($actual->get('empty'));
    }

    protected function createWebResource()
    {
        return [
            'about'                    => 'http://example.com',
            'webResourceDcRights'      => $this->createLangmap(),
            'webResourceEdmRights'     => $this->createLangmap(),
            'dcDescription'            => $this->createLangmap(),
            'dcFormat'                 => $this->createLangmap(),
            'dcSource'                 => $this->createLangmap(),
            'dctermsExtent'            => $this->createLangmap(),
            'dctermsIssued'            => $this->createLangmap(),
            'dctermsConformsTo'        => $this->createLangmap(),
            'dctermsCreated'           => $this->createLangmap(),
            'dctermsIsFormatOf'        => $this->createLangmap(),
            'dctermsHasPart'           => $this->createLangmap(),
            'isNextInSequence'         => 'foobar',
        ];
    }

    protected function assertWebResource(array $expected, WebResource $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('Colada\Europeana\Model\EDM\WebResource', $actual);
        $this->assertLangmap($expected['webResourceDcRights'], $actual->getWebResourceDcRights());
        unset($expected['webResourceDcRights']);
        $this->assertLangmap($expected['webResourceEdmRights'], $actual->getWebResourceEdmRights());
        unset($expected['webResourceEdmRights']);
        $this->assertLangmap($expected['dcDescription'], $actual->getDcDescription());
        unset($expected['dcDescription']);
        $this->assertLangmap($expected['dcFormat'], $actual->getDcFormat());
        unset($expected['dcFormat']);
        $this->assertLangmap($expected['dcSource'], $actual->getDcSource());
        unset($expected['dcSource']);
        $this->assertLangmap($expected['dctermsExtent'], $actual->getDctermsExtent());
        unset($expected['dctermsExtent']);
        $this->assertLangmap($expected['dctermsIssued'], $actual->getDctermsIssued());
        unset($expected['dctermsIssued']);
        $this->assertLangmap($expected['dctermsConformsTo'], $actual->getDctermsConformsTo());
        unset($expected['dctermsConformsTo']);
        $this->assertLangmap($expected['dctermsCreated'], $actual->getDctermsCreated());
        unset($expected['dctermsCreated']);
        $this->assertLangmap($expected['dctermsIsFormatOf'], $actual->getDctermsIsFormatOf());
        unset($expected['dctermsIsFormatOf']);
        $this->assertLangmap($expected['dctermsHasPart'], $actual->getDctermsHasPart());
        unset($expected['dctermsHasPart']);
        $this->assertEquals($expected, [
            'about'                     => $actual->getAbout(),
            'isNextInSequence'          => $actual->getIsNextInSequence(),
        ]);
    }

    protected function createSimilarItems()
    {
        return [];
    }

    protected function createProvidersItem()
    {
        return [
            'identifier'    => 'foobar',
            'country'       => 'country',
            'name'          => 'name',
            'acronym'       => 'acronym',
            'altname'       => 'altname',
            'scope'         => 'scope',
            'domain'        => 'domain',
            'geolevel'      => 'geolevel',
            'role'          => 'role',
            'website'       => 'website'
        ];
    }

    protected function assertProvidersItem(array $expected, ProviderItem $actual)
    {
        $this->assertInstanceOf('Colada\Europeana\Model\Providers\Item', $actual);
        $this->assertEquals($expected, [
            'identifier'    => $actual->getIdentifier(),
            'country'       => $actual->getCountry(),
            'name'          => $actual->getName(),
            'acronym'       => $actual->getAcronym(),
            'altname'       => $actual->getAltname(),
            'scope'         => $actual->getScope(),
            'domain'        => $actual->getDomain(),
            'geolevel'      => $actual->getGeolevel(),
            'role'          => $actual->getRole(),
            'website'       => $actual->getWebsite(),
        ]);
    }

    protected function createDatasetsItem()
    {
        return [
            'identifier'        => 'id',
            'provIdentifier'    => 'id',
            'providerName'      => 'provider',
            'edmDatasetName'    => 'edmDatasetName',
            'status'            => 'status',
            'publishedRecords'  => 10,
            'deleteRecords'     => 10,
            'creationDate'      => 'date'  // @todo Fix Date datetype?
        ];
    }

    protected function assertDatasetsItem(array $expected, DatasetItem $actual)
    {
        $this->assertInstanceOf('Colada\Europeana\Model\Datasets\Item', $actual);
        $this->assertEquals($expected, [
            'identifier'           => $actual->getIdentifier(),
            'provIdentifier'       => $actual->getProvIdentifier(),
            'providerName'         => $actual->getProviderName(),
            'edmDatasetName'       => $actual->getEdmDatasetName(),
            'status'               => $actual->getStatus(),
            'publishedRecords'     => $actual->getPublishedRecords(),
            'deleteRecords'        => $actual->getDeleteRecords(),
            'creationDate'         => $actual->getCreationDate()
        ]);
    }
}
