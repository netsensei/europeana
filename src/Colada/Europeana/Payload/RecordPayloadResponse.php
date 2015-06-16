<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Payload;

use Colada\Europeana\Model\Object;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class RecordPayloadResponse extends AbstractPayloadResponse
{
	/**
	 * @var Object
	 */
	private $object;

	/**
	 * @var ArrayCollection<Europeana/Model/SimilarItem>
	 */
	private $similarItems;

	/**
	 * @return object
	 */
	public function getObject()
	{
		return $this->object;
	}

	/**
	 * @return similarItems
	 */
	public function getSimilarItems()
	{
		return $this->similarItems;
	}
}
