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

class Request {

	private $query;

	private $profile;

	private $rows;

	private $start;

	public function __construct($query = NULL, $profile = NULL, $rows = 12, $start = 1) {
		$this->query = $query;
		$this->profile = $profile;
		$this->rows = $rows;
		$this->start = $start;
	}

	public function setRows($rows) {
		$this->rows = $rows;
	}

	public function getRows() {
		return $this->rows;
	}

	public function setStart($start) {
		$this->start = $start;
	}

	public function getStart() {
		return $this->start;
	}

	public function setQuery($query) {
		$this->query = $query;
	}

	public function getQuery() {
		return $this->query;
	}
}
