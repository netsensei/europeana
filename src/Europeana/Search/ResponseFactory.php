<?php

namespace Europeana\Search;

use Europeana\JsonAdapter\JsonAdapterInterface;
use Europeana\Search\Response;
use JMS\Serializer\SerializerBuilder;

class ResponseFactory {

	private $jsonAdapter;

	public function __construct(JsonAdapterInterface $jsonAdapter = NULL) {
		if (!is_null($jsonAdapter)) {
			$this->jsonAdapter = $jsonAdapter;
		}
		else {
			$this->jsonAdapter = SerializerBuilder::create()->build();
		}
	}

	public function create($data) {
		return $this->jsonAdapter->deserialize($data, 'Response', 'json');
	}
}
