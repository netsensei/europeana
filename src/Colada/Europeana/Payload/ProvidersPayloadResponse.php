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

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class ProvidersPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var integer
     */
    private $itemsCount;

    /**
     * @var integer
     */
    private $totalResults;

    /**
     * @var ArrayCollection<Europeana/Model/Providers/Item>
     */
    private $items;

    /**
     * @return itemsCount
     */
    public function getItemsCount()
    {
        return $this->itemsCount;
    }

    /**
     * @return totalResults
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @return items
     */
    public function getItems()
    {
        return $this->items;
    }
}
