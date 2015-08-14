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
class DatasetPayload extends AbstractPayload
{
    private $datasetId;

    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
    }

    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'dataset/'.$this->datasetId .'.json';
    }
}
