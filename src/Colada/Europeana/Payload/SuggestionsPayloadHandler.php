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
class SuggestionsPayloadHandler extends AbstractPayloadHandler
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        $payload = $this->getPayload();

   	    $arguments[] = array('query', $payload->getQuery());

        if ($rows = $payload->getRows()) {
            $arguments[] = array('rows', $rows);
        }

   	    return $arguments;
    }
}
