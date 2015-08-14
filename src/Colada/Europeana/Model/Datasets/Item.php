<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Model\Datasets;

use Colada\Europeana\Model\AbstractModel;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Item extends AbstractModel
{
    private $identifier;

    private $provIdentifier;

    private $providerName;

    private $edmDatasetName;

    private $status;

    private $publishedRecords;

    private $deleteRecords;

    private $creationDate;

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getProvIdentifier()
    {
        return $this->provIdentifier;
    }

    public function getProviderName()
    {
        return $this->providerName;
    }

    public function getEdmDatasetName()
    {
        return $this->edmDatasetName;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPublishedRecords()
    {
        return $this->publishedRecords;
    }

    public function getDeleteRecords()
    {
        return $this->deleteRecords;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }
}
