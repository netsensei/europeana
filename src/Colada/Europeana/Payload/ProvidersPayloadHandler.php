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
class ProvidersPayloadHandler extends AbstractPayloadHandler
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
    	  $arguments = array();

        $payload = $this->getPayload();

        if ($offset = $payload->getOffset()) {
            $arguments[] = array('offset', $offset);
        }

        if ($pageSize = $payload->getPageSize()) {
            $arguments[] = array('pagesize', $pageSize);
        }

        if ($countryCode = $payload->getCountryCode()) {
            $arguments[] = array('countryCode', $countryCode);
        }

   	    return $arguments;
    }
}
