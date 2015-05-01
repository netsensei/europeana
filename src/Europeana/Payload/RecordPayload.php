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

use Europeana\Exception\EuropeanaException;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class RecordPayload extends AbstractPayload
{
    private $recordId;

    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
    }

    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'record' . $this->recordId . '.json';
    }
}
