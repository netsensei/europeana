<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Transport;

use Europeana\Exception\EuropeanaException;
use Europeana\Payload\PayloadInterface;
use Europeana\Payload\PayloadResponseInterface;
use Europeana\Payload\PayloadHandlerFactory;
use Europeana\Serializer\PayloadResponseSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;

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

            $responseData = $this->doSend($payload);

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
            $responseData = $response->json();
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
        $url = self::API_BASE_URL.'/'.self::API_VERSION.'/'.$method;
        $request = $this->client->createRequest('GET', $url);

        $query = $request->getQuery();
        foreach ($arguments as $arg) {
            list($key, $value) = $arg;
            $query->add($key, $value);
        }

        return $request;
    }
}
