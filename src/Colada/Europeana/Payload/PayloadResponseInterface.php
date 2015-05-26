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
interface PayloadResponseInterface
{
    /**
     * Return the apiKey value.
     *
     * @return string
     */
    public function getApikey();

    /**
     * Return the action value.
     *
     * @return [type] [description]
     */
    public function getAction();

    /**
     * Return the success value
     *
     * @return boolean
     */
    public function isSuccess();

    /**
     * Return the statsDuration value
     *
     * @return int
     */
    public function getStatsDuration();

    /**
     * Return the requestNumber value
     *
     * @return int
     */
    public function getRequestNumber();

    /**
     * Return the error value
     *
     * @return int
     */
    public function getError();

    /**
     * Return the params value
     *
     * @return \Colada\Europeana\Model\Params
     */
    public function getParams();
}
