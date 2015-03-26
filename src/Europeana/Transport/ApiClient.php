<?php

/*
 * This file is part of the Europeana package
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
use Europeana\Serializer\PayloadResponseSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Post\PostBody;

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
    const API_BASE_URL = 'https://europeana.eu/api/';

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
     * @param string|null                   $apiKey
     * @param ClientInterface|null          $client
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
                throw new \Exception('You must supply an API key to send a payload, since you did not provide one during construction');
            }

            $serializedPayload = $this->payloadSerializer->serialize($payload);
            $responseData      = $this->doSend($payload->getMethod(), $serializedPayload, $token);

            return $this->payloadResponseSerializer->deserialize($responseData, $payload->getResponseClass());
        } catch (\Exception $e) {
            throw new \Exception('Failed to send payload', null, $e);
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
    private function doSend($method, array $data, $apiKey = null)
    {
        try {
            $data['wskey'] = $apiKey ?: $this->apiKey;

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
    private function createRequest($method, array $payload)
    {
        $url = self::API_BASE_URL.'/'. self::API_VERSION.'/'.$method;
        $request = $this->client->createRequest('POST');
        $request->setUrl($url);

        $body = new PostBody();
        $body->replaceFields($payload);

        $request->setBody($body);

        return $request;
    }
}
