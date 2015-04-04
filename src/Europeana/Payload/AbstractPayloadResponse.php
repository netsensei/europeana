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
abstract class AbstractPayloadResponse implements PayloadResponseInterface
{
    /**
     * @var bool
     */
    private $ok;

    /**
     * @var string
     */
    private $error;

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        return (bool) $this->ok;
    }
}
