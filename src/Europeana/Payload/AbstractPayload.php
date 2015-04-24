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

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
abstract class AbstractPayload implements PayloadInterface
{
    private $apiKey;

    /**
     * {@inheritdoc}
     */
    public function getResponseClass()
    {
        return sprintf('%sResponse', get_class($this));
    }

    /**
     * {@inheritdoc}
     */
    public function getHandlerClass()
    {
        return sprintf('%sHandler', get_class($this));
    }
}
