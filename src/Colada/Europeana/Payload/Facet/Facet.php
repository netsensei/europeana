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

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Facet implements FacetInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var int|null
     */
    private $offset;

    /**
     * Constructor.
     *
     * The facet name is mandatory. limit and offset are optional.
     *
     * @param string   $name   The name of the facet.
     * @param int|null $limit  The facet limit.
     * @param int|null $offset The offset.
     */
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
