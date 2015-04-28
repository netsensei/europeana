<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Tests;

use Europeana\Model\Item;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    protected function createItem()
    {
        return [
            'europeanaCompleteness'   => 1,
            'dataProvider'            => ['provider one', 'provider two'],
            'europeanaCollectionName' => ['collection one', 'collection two'],
            'id'                      => 'europeana_id',
            'guid'                    => 'guid',
            'link'                    => 'http://example.com/object',
            'provider'                => ['provider'],
            'rights'                  => ['http://example.com/rights'],
            'type'                    => 'IMAGE',
            'dcCreator'               => ['creator one'],
            'edmConceptLabel'         => [['def' => 'foto'], ['def' => 'photograph']],
            'edmPreview'              => ['http://example.com/representation'],
            'edmTimespanLabel'        => [['def' => '20th'], ['def' => 'Early 20th Century']],
            'language'                => ['fr', 'en'],
            'title'                   => ['title', 'alternative'],
            'year'                    => ['1798', '1800'],
            'edmIsShownAt'            => ['http://example.com/isshownat'],
            'edmPlaceLatitude'        => ['48.85341'],
            'edmPlaceLongitude'       => ['2.3488'],
            'score'                   => '9.9999990',
            //'edmConceptTerm'          => [''],
            //'edmConceptPrefLabel'     => [''],
            //'edmConceptBroaderTerm'   => [''],
            //'edmConceptBroaderLabel'  => [''],
            //'edmTimespanBegin'        => [''],
            //'edmTimespanEnd'          => [''],
            //'edmTimespanBroaderTerm'  => [''],
            //'edmTimespanBroaderLabel' => [''],
            'ugc'                     => [true],
            // 'country'                 => ['Belgium'],
            //'edmPlaceBroaderTerm'     => [''],
            //'edmPlaceAltLabel'        => '',
            //'dctermsIsPartOf'         => [''],
            //'dctermsSpatial'          => [''],
            //'edmPlace'                => ['http://example.com/edmplace'],
            //'edmTimespan'             => ['http://example.com/edmTimespan'],
            'edmAgent'                => ['http://example.com/edmAgent'],
            'edmAgentLabel'           => [['def' => 'agent'], ['def' => 'ag']],
            'dcContributor'           => ['contributor'],
            'edmIsShownBy'            => ['http://example.com/shownby'],
            'dcDescription'           => ['description'],
            'edmLandingPage'          => ['http://example.com/landingpage'],
            'timestamp_created_epoch' => 1234567890000,
            'timestamp_update_epoch'  => 1234567890000,
            'timestamp_created'       => '2014-10-28T17:19:12.461Z',
            'timestamp_update'        => '2014-10-28T17:19:12.461Z',
        ];
    }

    protected function createFacet()
    {
    }

    protected function createBreadcrumb()
    {
    }

    protected function assertItem(array $expected, Item $actual)
    {
        $this->assertEquals($expected, [
            'europeanaCompleteness'   => $actual->getEuropeanaCompleteness(),
            'dataProvider'            => $actual->getDataProvider(),
            'europeanaCollectionName' => $actual->getEuropeanaCollectionName(),
            'id'                      => $actual->getId(),
            'guid'                    => $actual->getGuid(),
            'link'                    => $actual->getLink(),
            'provider'                => $actual->getProvider(),
            'rights'                  => $actual->getRights(),
            'type'                    => $actual->getType(),
            'dcCreator'               => $actual->getDcCreator(),
            'edmConceptLabel'         => $actual->getEdmConceptLabel(),
            'edmPreview'              => $actual->getEdmPreview(),
            'edmTimespanLabel'        => $actual->getEdmTimespanLabel(),
            'language'                => $actual->getLanguage(),
            'title'                   => $actual->getTitle(),
            'year'                    => $actual->getYear(),
            'edmIsShownAt'            => $actual->getEdmIsShownAt(),
            'edmPlaceLatitude'        => $actual->getEdmPlaceLatitude(),
            'edmPlaceLongitude'       => $actual->getEdmPlaceLongitude(),
            'score'                   => $actual->getScore(),
            //'edmConceptTerm'          => [''],
            //'edmConceptPrefLabel'     => [''],
            //'edmConceptBroaderTerm'   => [''],
            //'edmConceptBroaderLabel'  => [''],
            //'edmTimespanBegin'        => [''],
            //'edmTimespanEnd'          => [''],
            //'edmTimespanBroaderTerm'  => [''],
            //'edmTimespanBroaderLabel' => [''],
            'ugc'                     => $actual->getUgc,
            // 'country'                 => ['Belgium'],
            //'edmPlaceBroaderTerm'     => [''],
            //'edmPlaceAltLabel'        => '',
            //'dctermsIsPartOf'         => [''],
            //'dctermsSpatial'          => [''],
            //'edmPlace'                => ['http://example.com/edmplace'],
            //'edmTimespan'             => ['http://example.com/edmTimespan'],
            'edmAgent'                => $actual->getEdmAgent(),
            'edmAgentLabel'           => $actual->getEdmAgentLabel(),
            'dcContributor'           => $actual->getDcContributor,
            'edmIsShownBy'            => $actual->getEdmIsShownBy(),
            'dcDescription'           => $actual->getDcDescription(),
            'edmLandingPage'          => $actual->getEdmLandingPage,
            'timestamp_created_epoch' => $actual->getTimespanCreatedEpoch(),
            'timestamp_update_epoch'  => $actual->getTimespanUpdateEpoch(),
            'timestamp_created'       => $actual->getTimespanCreated(),
            'timestamp_update'        => $actual->getTimespanUpdate(),
        ]);
    }
}
