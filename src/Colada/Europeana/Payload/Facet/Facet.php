<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Payload\Facet;

use Colada\Europeana\Payload\Facet\FacetInterface;

class Facet implements FacetInterface
{
    private $name;

    private $limit;

    private $offset;

    public function __construct($name, $limit = null, $offset = null)
    {
        $this->name = $name;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * {@inheritdoc}
     */
    public function getOffset()
    {
        return $this->offset;
    }
}
