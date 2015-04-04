<?php

namespace Europeana\Tests;

use Europeana\Transport\ApiClient;
use Europeana\Payload\SearchPayload;
use Europeana\Exception\EuropeanaException;
use GuzzleHttp\Client;
use GuzzleHttp\Ring\Client\MockHandler;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Message\Response;

class SearchTest extends \PHPUnit_Framework_TestCase
{
 /*   private $apiClient;

    private $headers = array('Server' => 'Mock');

    private $status = 200;

    public function setUp()
    {
        $rawBody = file_get_contents(__DIR__.'/../mock/responses/BasicSearchResponse.txt');
        $body = Stream::factory($rawBody);
        $response = new Response($this->status, $this->headers, $body);
        $response = array(
            'status' => $response->getStatusCode(),
            'headers' => $response->getHeaders(),
            'body' => $response->getBody(),
        );

        $mock = new MockHandler($response);
        $client = new Client(array('handler' => $mock));
        $this->apiClient = new ApiClient('api2demo', $client);
    }

    public function testRequests()
    {
        $searchPayload = new SearchPayload();
        $searchPayload->setQuery("Mona Lisa");

        try {
            $response = $this->apiClient->send($searchPayload);
            $items = $response->getItems();
        } catch (EuropeanaException $e) {
            // Do something
        }
    } */
}
