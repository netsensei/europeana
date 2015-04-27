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
     * @var string
     */
    private $apikey;

    /**
     * @var string
     */
    private $action;

    /**
     * @var bool
     */
    private $success;

    /**
     * @var integer
     */
    private $statsDuration;

    /**
     * @var integer
     */
    private $requestNumber;

    /**
     * @var string
     */
    private $error;

    /**
     * @var array
     */
    private $params;

    /**
     * {@inheritdoc}
     */
    public function getApikey()
    {
        return $this->apikey;
    }

    /**
     * {@inheritdoc}
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * {@inheritdoc}
     */
    public function isSuccess()
    {
        return (bool) $this->success;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatsDuration()
    {
        return $this->statsDuration;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestNumber()
    {
        return $this->requestNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return $this->params;
    }
}
