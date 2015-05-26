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
interface RefinementInterface
{
    /**
     * Get the field name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the value for the defined field.
     *
     * @return string
     */
    public function getValue();
}
