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
class SearchPayload extends AbstractPayload
{
    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'search.json';
    }

    public function setQuery($value)
    {
        $this->setArgument('query', $value);
    }

    public function setProfile($value)
    {
        $this->setArgument('profile', $value, true);
    }

    public function setFacet($value)
    {
        $this->setArgument('facet', $value, true);
    }
}
