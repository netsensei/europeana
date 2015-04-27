<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Example;

/* use Europeana\Search\Request;
use Europeana\Search\Search; */
use Europeana\Transport\ApiClient;
use Europeana\Payload\SearchPayload;
use Europeana\Exception\EuropeanaException;

class Example
{

    private $search;

    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getBasicSearchQuery()
    {
        $searchPayload = new SearchPayload();
        $searchPayload->setQuery("Mona Lisa");

        try {
            $response = $this->apiClient->send($searchPayload, 'api2demo');
            var_dump($response->getAction());
            var_dump($response->isSuccess());
            var_dump($response->getRequestNumber());
            var_dump($response->getItemsCount());
            var_dump($response->getTotalResults());
            $items = $response->getItems();
          /*  var_dump($items->get(1)->getId());
            var_dump($items->get(1)->getCompleteness());
            var_dump($items->get(1)->getEuropeanaCollectionName());
            var_dump($items->get(1)->getIndex());
            var_dump($items->get(1)->getEdmDatasetName());
            var_dump($items->get(1)->getPreviewNoDistribute());
            var_dump($items->get(1)->getTitle());
            var_dump($items->get(1)->getDataProvider());
            var_dump($items->get(1)->getRights());
            var_dump($items->get(1)->getScore());
            var_dump($items->get(1)->getEdmIsShownAt());
            var_dump($items->get(1)->getEuropeanaCompleteness());
            var_dump($items->get(1)->getEdmPreview());
            var_dump($items->get(1)->getTimestamp());
            var_dump($items->get(1)->getProvider());
            var_dump($items->get(1)->getLanguage());
            var_dump($items->get(1)->getType());
            var_dump($items->get(1)->getOptedOut()); */
            var_dump($items->get(1)->getLink());
            var_dump($items->get(1)->getGuid());
            var_dump($items->get(2)->getLink());
            var_dump($items->get(2)->getGuid());
        } catch (EuropeanaException $e) {
            // Do something
        }
    }
}
