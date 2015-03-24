<?php

namespace Europeana\JsonAdapter;

interface JsonAdapterInterface {

	public function deserialize($data, $type, $format);

}
