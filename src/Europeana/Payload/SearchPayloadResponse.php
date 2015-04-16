<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Payload;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class SearchPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var integer
     */
    private $requestNumber;

    /**
     * @var integer
     */
    private $itemsCount;

    /**
     * @var integer
     */
    private $totalResults;

    /**
     * @var ResponseCollection<Europeana/Model/Item>
     */
    private $items;

    /**
     * @return Success
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return Action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return requestNumber
     */
    public function getRequestNumber()
    {
        return $this->requestNumber;
    }

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
