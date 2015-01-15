<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Http;

use Europeana\Http\HttpInterface;

class GuzzleHttp implements HttpInterface {

	protected $httpClient;

	public function __construct($httpClient) {
		$this->httpClient = $httpClient;
	}

	public function setParameters($params = array()) {

	}

	public function request() {

	}

	public function getResponse() {

	}

	public function getErrors() {

	}
}
