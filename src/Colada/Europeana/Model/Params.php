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
class Params
{
    private $query;

    private $qf;

    private $profiles;

    private $start;

    private $rows;

    public function getQuery()
    {
        return $this->query;
    }

    public function getRefinements()
    {
        return $this->qf;
    }

    public function getProfiles()
    {
        return $this->profiles;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getRows()
    {
        return $this->rows;
    }
}
