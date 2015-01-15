<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana;

use Europeana\Http\Httpinterface;
use Europeana\Exception\EuropeanaException;
use Europeana\Request;

class Search {

	const API_VERSION = 'v2';

	private $publicKey;

	private $privateKey;

	private $server = 'europeana.eu/api';

	private $queryString = array();

	protected $httpClient;

	public function __construct(HttpInterface $httpClient, $publicKey = NULL, $privateKey = NULL) {
		$this->httpClient = $httpClient;
		$this->publicKey = $publicKey;
		$this->privateKey = $privateKey;
	}

	public function setPublicKey($publicKey) {
		$this->publicKey = $publicKey;
	}

	public function getPublicKey() {
		return $this->publicKey;
	}

	public function setPrivateKey($privateKey) {
		$this->privateKey = $privateKey;
	}

	public function getPrivateKey($privateKey) {
		return $this->privatekey;
	}

	public function setRequest(request = array()) {
		$this->request = $request;
	}

	public function setProfile($profile = array()) {
		$this->profile = $profile;
	}

	public function send() {
		$data = array();

		if (!empty($queryString)) {
			$data['query'] = $queryString;
		}

		$response = $this->query('GET', 'search.json', $data);
	}

	private function query($method, $path, array $data = array()) {
		$server = 'http://' . $this->server;
		$max_attempts = $this->requestMaxAttempts;

		while ($max_attempts-- > 0) {
			try {
				$result = $this->httpClient($method, $server, $path, $data);
			} catch (EuropeanaException $e) {

			}
		}
	}
}
