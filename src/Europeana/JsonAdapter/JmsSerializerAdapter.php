<?php

namespace Europeana\JsonAdapter;

use Europeana\JsonAdapter\JsonAdapterInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class JmsSerializerAdapter implements JsonAdapterInterface {

	public function deserialize($data, $type, $format) {
		$builder = SerializerBuilder::create();
		$serializer = $builder->build();
		$response = $serializer->deserialize($data, $type, $format);
		return $response;
	}

}
