<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Search;

use Europeana\Http\Httpinterface;
use Europeana\Exception\EuropeanaException;
use Europeana\Search\Request;

class Search {

	const API_VERSION = 'v2';

	private $publicKey;

	private $privateKey;

	private $server = 'europeana.eu/api';

	private $queryString = array();

	private $response;

	private $request;

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

	public function setRequest(Request $request) {
		$this->request = $request;
	}

	public function getResponse() {
		return $this->response;
	}

	public function setProfile($profile = array()) {
		$this->profile = $profile;
	}

	public function send() {
		$data = array();

		$data = array('wskey' => $this->getPublicKey());
		$queryString = $this->request->getQuery();
		if (!empty($queryString)) {
			$data += array('query' => $queryString);
		}

    $this->query($data);
	}

	private function query(array $data = array()) {
		$endpoint = 'http://' . $this->server . '/' . Search::API_VERSION . '/search.json';
		return $this->httpClient->get($endpoint, $data);
	}
}
