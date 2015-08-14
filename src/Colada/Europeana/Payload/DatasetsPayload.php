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
class DatasetsPayload extends AbstractPayload
{
    private $providerId;

    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }

    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'provider/'.$this->providerId.'/datasets.json';
    }
}
