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
    public function getApikey();

    public function getAction();

    public function isSuccess();

    public function getStatsDuration();

    public function getRequestNumber();

    public function getError();

    public function getParams();
}
