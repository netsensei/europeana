<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Payload;

use Colada\Europeana\Exception\EuropeanaException;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class SuggestionsPayload extends AbstractPayload
{
		/**
     * @var string
     */
    private $query;

    /**
     * @var int
     */
    private $rows;

    /**
     * Set the query parameter.
     *
     * The query is a search term to look for.
     *
     * @link http://labs.europeana.eu/api/query/
     *
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * Returns the set query
     *
     * @return string|null
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set the rows parameter
     *
     * @param int
     */
    public function setRows($rows)
    {
        try {
            if (!is_numeric($rows)) {
                throw new \InvalidArgumentException(sprintf(
                    'Expected argument to be of type "integer", got "%s"',
                    gettype($rows)
                ));
            }
            $this->rows = $rows;
        } catch (\InvalidArgumentException $e) {
            throw new EuropeanaException('Failed to prepare payload', null, $e);
        }
    }

    /**
     * Returns the rows parameter value
     *
     * @param int|null
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'suggestions.json';
    }
}
