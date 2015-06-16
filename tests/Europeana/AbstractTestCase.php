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

use Colada\Europeana\Model\Breadcrumb;
use Colada\Europeana\Model\Facet;
use Colada\Europeana\Model\Item;
use Colada\Europeana\Model\Params;
use Colada\Europeana\Model\EDM\Label;

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
            'ugc'                     => [true],
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
            //'edmPlace'                => ['http://example.com/edmplace'],
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

    protected function assertItem(array $expected, Item $actual)
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
            'ugc'                     => $actual->getUgc()->toArray(),
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
            //'edmPlace'                 => $actual->getEdmPlace(),
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
        $this->assertInstanceOf('Colada\Europeana\Model\Facet', $actual);
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
        $this->assertInstanceOf('Colada\Europeana\Model\Breadcrumb', $actual);
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

    protected function createObject()
    {
        return [];
    }

    protected function createSimilarItem()
    {
        return [];
    }
}
