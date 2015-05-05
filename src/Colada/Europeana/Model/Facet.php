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
class Facet
{
    private $name;

    private $fields;

    public function getName()
    {
        return $this->name;
    }

    public function getFields()
    {
        return $this->fields;
    }
}
