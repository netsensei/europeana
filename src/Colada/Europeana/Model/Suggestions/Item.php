<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Model\Suggestions;

use Colada\Europeana\Model\AbstractModel;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Item extends AbstractModel
{
    private $term;

    private $frequency;

    private $field;

    private $query;

    public function getTerm()
    {
        return $this->term;
    }

    public function getFrequency()
    {
        return $this->frequency;
    }

    public function getField()
    {
        return $this->field;
    }

    public function getQuery()
    {
        return $this->query;
    }
}
