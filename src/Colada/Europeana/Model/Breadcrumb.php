<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Model;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Breadcrumb
{
    private $display;

    private $href;

    private $param;

    private $value;

    private $last;

    public function getDisplay()
    {
        return $this->display;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getLast()
    {
        return $this->last;
    }
}
