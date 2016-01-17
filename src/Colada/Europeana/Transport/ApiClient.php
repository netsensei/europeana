<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Transport;

use Colada\Europeana\Exception\EuropeanaException;
use Colada\Europeana\Payload\PayloadInterface;
use Colada\Europeana\Payload\PayloadResponseInterface;
use Colada\Europeana\Payload\PayloadHandlerFactory;
use Colada\Europeana\Serializer\PayloadResponseSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
// use GuzzleHttp\Message\RequestInterface;
//use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class ApiClient implements ApiClientInterface
{
    /**
     * The API version
     */
    const API_VERSION = 'v2';

    /**
     * The (base) URL used for all communication with the Europeana API.
     */
    const API_BASE_URL = 'http://europeana.eu/api';

    /**
     * @var string|null
     */
    private $apiKey;

    /**
     * @var PayloadResponseSerializer
     */
    private $payloadResponseSerializer;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param string|null          $apiKey
     * @param ClientInterface|null $client
     */
    public function __construct(
        $apiKey = null,
        ClientInterface $client = null
    ) {
        $this->apiKey                    = $apiKey;
        $this->payloadResponseSerializer = new PayloadResponseSerializer();
        $this->client                    = $client ?: new Client();
    }

    /**
     * @param PayloadInterface $payload The payload to send
     * @param string|null      $apiKey  Required API key to use during the API-call,
     *                                  defaults to the one configured during construction
     *
     * @throws EuropeanaException If the payload could not be sent
     *
     * @return PayloadResponseInterface Actual class depends on the payload used,
     *                                  e.g. chat.postMessage will return an instance of ChatPostMessagePayloadResponse
     */
    public function send(PayloadInterface $payload, $apiKey = null)
    {
        try {
            if ($apiKey === null && $this->apiKey === null) {
                throw new \InvalidArgumentException('You must supply an API key to send a payload, since you did not provide one during construction');
            }

            $responseData = $this->doSend($payload, $apiKey);

            return $this->payloadResponseSerializer->deserialize($responseData, $payload->getResponseClass());
        } catch (\Exception $e) {
            throw new EuropeanaException('Failed to send payload', null, $e);
        }
    }

    /**
     * @param string      $method
     * @param array       $data
     * @param string|null $apiKey
     *
     * @throws EuropeanaException
     *
     * @return array
     */
    private function doSend($payload, $apiKey = null)
    {
        try {
            $method = $payload->getMethod();

            $handler = PayloadHandlerFactory::getHandler($payload);
            $data = $handler->get();

            $data[] = array('wskey', ($apiKey ? $apiKey : $this->apiKey));

            $request = $this->createRequest($method, $data);

            /** @var ResponseInterface $response */
            $response = $this->client->send($request);
        } catch (\Exception $e) {
            throw new EuropeanaException('Failed to send data to the Europeana API', null, $e);
        }

        try {
            $data = $response->getBody();
            $responseData = json_decode($data, true, 512, JSON_BIGINT_AS_STRING);

            if (!is_array($responseData)) {
                throw new \Exception(sprintf(
                    'Expected JSON-decoded response data to be of type "array", got "%s"',
                    gettype($responseData)
                ));
            }

            return $responseData;
        } catch (\Exception $e) {
            throw new EuropeanaException('Failed to process response from the Europeana API', null, $e);
        }
    }

    /**
     * @param string $method
     * @param array  $payload
     *
     * @return RequestInterface
     */
    private function createRequest($method, array $arguments)
    {
        $uri = new Uri(self::API_BASE_URL.'/'.self::API_VERSION.'/'.$method);

        foreach ($arguments as $arg) {
            list($key, $value) = $arg;
            $uri = $uri->withQueryValue($uri, $key, $value);
        }

        return new  Request('GET', $uri);
    }
}
