<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Tests\Test\Payload;

use Colada\Europeana\Payload\AbstractPayloadHandler;

class MockPayloadHandler extends AbstractPayloadHandler
{
    public function get()
    {
        $payload = $this->getPayload();
        $arguments[] = array('foo', $payload->getFoo());

        return $arguments;
    }
}
