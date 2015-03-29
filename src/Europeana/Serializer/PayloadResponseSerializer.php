<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Serializer;

use Europeana\Payload\PayloadResponseInterface;
use JMS\Serializer\DeserializationContext;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class PayloadResponseSerializer extends AbstractSerializer
{
    /**
     * @param array  $payloadResponse
     * @param string $payloadResponseClass
     *
     * @return PayloadResponseInterface
     */
    public function deserialize(array $payloadResponse, $payloadResponseClass, array $context)
    {
        $context = new DeserializationContext();
        if (!empty($context)) {
            foreach ($context as $key => $value) {
                $context->attributes->set($key, $value);
            }
        }

        $payloadResponseObject = $this->serializer->deserialize(
            json_encode($payloadResponse),
            $payloadResponseClass,
            'json',
            $context
        );

        if (!($payloadResponseObject instanceof PayloadResponseInterface)) {
            throw new \RuntimeException(sprintf(
                'The serializer expected the response data to be converted into an instance of "%s", got: %s',
                $payloadResponseClass,
                is_object($payloadResponseObject) ? 'instance of '.get_class($payloadResponseObject) : gettype($payloadResponseObject)
            ));
        }

        return $payloadResponseObject;
    }
}
