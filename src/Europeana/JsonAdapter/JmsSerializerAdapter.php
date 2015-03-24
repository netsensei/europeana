<?php

namespace Europeana\JsonAdapter;

use Europeana\JsonAdapter\JsonAdapterInterface;
use Europeana\Search\JmsItemHandler;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\DeserializationContext;

class JmsSerializerAdapter implements JsonAdapterInterface {

	public function deserialize($data, $type, $format) {
		$builder = SerializerBuilder::create();
    $builder
    ->configureHandlers(function(HandlerRegistry $registry) {
	$registry->registerSubscribingHandler(new JmsItemHandler());
    });
		$serializer = $builder->build();

    $context = new DeserializationContext();
    $context->attributes->set('foobar', "blergh");

		$response = $serializer->deserialize($data, $type, $format, $context);
var_dump($response);
		return $response;
	}

}
