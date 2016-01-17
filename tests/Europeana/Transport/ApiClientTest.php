<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Tests\Transport;

use Colada\Europeana\Exception\EuropeanaException;
use Colada\Europeana\Tests\AbstractTestCase;
use Colada\Europeana\Tests\Test\Payload\MockPayload;
use Colada\Europeana\Transport\ApiClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class ApiClientTest extends AbstractTestCase
{
    const API_KEY = 'fake';

    public function testSend()
    {
        $container = [];
        $history = Middleware::history($container);

        $mockResponseData = json_encode([
            'ok'  => true,
            'foo' => 'bar',
        ]);

        $mock = new MockHandler([
            new Response(200, [], $mockResponseData)
        ]);

        $stack = HandlerStack::create($mock);
        $stack->push($history);
        $client = new Client(['handler' => $stack]);

        $mockPayload = new MockPayload();
        $foo = 'who:(search+query+OR+other+search+query)';
        $mockPayload->setFoo($foo);

        $apiClient = new ApiClient(self::API_KEY, $client);
        $payloadResponse = $apiClient->send($mockPayload);

        $transaction = array_pop($container);

        // Assert response is of type MockPayloadResponse
        $this->assertInstanceOf('Colada\Europeana\Tests\Test\Payload\MockPayloadResponse', $payloadResponse);

        // Assert if the responses match up.
        $transaction['response']->getBody();
        $this->assertEquals($mockResponseData, $transaction['response']->getBody());

        // Assert if the URL is unfuddled.
        $expectedRequestUri = sprintf('http://europeana.eu/api/v2/mock.json?foo=%s&wskey=%s', $foo, self::API_KEY);
        $requestUri = $transaction['request']->getUri();
        $this->assertEquals($expectedRequestUri, $requestUri);
    }

    public function testSendWithoutKey()
    {
        /** @var PayloadInterface|\PHPUnit_Framework_MockObject_MockObject $mockPayload */
        $mockPayload = $this->getMock('Colada\Europeana\Payload\PayloadInterface');
        $apiClient   = new ApiClient();

        try {
            $apiClient->send($mockPayload);
        } catch (EuropeanaException $e) {
            $previous = $e->getPrevious();
            $this->assertInstanceOf('\InvalidArgumentException', $previous);
            $this->assertEquals(
                'You must supply an API key to send a payload, since you did not provide one during construction',
                $previous->getMessage()
            );

            return;
        }

        $this->markTestIncomplete('This test should have thrown an exception');
    }
}
