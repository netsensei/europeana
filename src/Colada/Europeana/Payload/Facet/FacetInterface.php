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
interface FacetInterface
{
    /**
     * Returns the facet name
     *
     * @return string
     */
    public function getName();

    /**
     * Returns the limit
     *
     * @return int
     */
    public function getLimit();

    /**
     * Returns the offset
     *
     * @return int
     */
    public function getOffset();
}
