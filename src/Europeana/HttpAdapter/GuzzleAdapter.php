<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\HttpAdapter;

use Europeana\HttpAdapter\HttpAdapterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException as GuzzleException;
use Europeana\Exception\HttpException;

class GuzzleAdapter implements HttpAdapterInterface {

	protected $client;

	public function __construct() {
		$this->client = new Client();
	}

	public function get($url, $data = array()) {
		try {
			$response = $this->client->get($url, array('query' => $data));
			return (string) $response->getBody();
		} catch (GuzzleException $e) {
			throw new HttpException($e->getMessage(), $e->getCode(), $e);
		}
	}
}
