<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Tests\Test\Payload;

use Europeana\Payload\AbstractPayload;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class MockPayload extends AbstractPayload
{
    private $foo;

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'mock.json';
    }

    public function setFoo($foo)
    {
        $this->foo = $foo;
    }

    public function getFoo()
    {
        return $this->foo;
    }
}
