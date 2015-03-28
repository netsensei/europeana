<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Payload;

use Europeana\Exception\EuropeanaException;

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
        $this->setArgument('profile', $value, TRUE);
    }

    public function setFacet($value)
    {
        $this->setArgument('facet', $value, TRUE);
    }

    /**
     * @return array
     */
    public function getContext()
    {
        $context = array();

        if ($profile = $this->getArgument('profile')) {
            $context['profile'] = $profile;
        }

        return $context;
    }
}
