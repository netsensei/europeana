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

use Colada\Europeana\Payload\AbstractPayloadResponse;

class MockPayloadResponse extends AbstractPayloadResponse
{
    private $foo;

    public function getFoo()
    {
        return $this->foo;
    }
}
