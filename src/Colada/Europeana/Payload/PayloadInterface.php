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
interface PayloadInterface
{
    /**
     * Return the API call method (ie. search.json) defined for this
     * payload object.
     *
     * @return string
     */
    public function getMethod();

    /**
     * Return the corresponding PayloadRepsonseInterface class for this
     * payload object.
     *
     * @return string
     */
    public function getResponseClass();

    /**
     * Return the corresponding PayloadHandlerInterface class for this
     * payload object.
     *
     * @return string
     */
    public function getHandlerClass();
}
