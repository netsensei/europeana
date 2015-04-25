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

use Europeana\Payload\AbstractPayloadHandler;

class SearchPayloadHandler extends AbstractPayloadHandler
{
    public function get()
    {
        $payload = $this->getPayload();

        $arguments[] = array('query', $payload->getQuery());

        foreach ($payload->getProfiles() as $profile) {
            $arguments[] = array('profile', $profile);
        }

        if ($reusability = $payload->getReusability()) {
            $arguments[] = array('reusability', $reusability);
        }

        if ($rows = $payload->getRows()) {
            $arguments[] = array('rows', $rows);
        }

        if ($start = $payload->getStart()) {
            $arguments[] = array('start', $start);
        }

        return $arguments;
    }
}
