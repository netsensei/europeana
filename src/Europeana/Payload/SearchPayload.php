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

use Europeana\Enum\Reusability;
use Europeana\Enum\Profile;
use Europeana\Exception\EuropeanaException;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class SearchPayload extends AbstractPayload
{
    private $query;

    private $qf = [];

    private $rows;

    private $start;

    private $reusability;

    private $facet;

    private $profiles = [];

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setReusability($reusability)
    {
        try {
            Reusability::assertExists($reusability);
            $this->reusability = $reusability;
        } catch (\Exception $e) {
            throw new EuropeanaException('Failed to prepare payload', null, $e);
        }
    }

    public function getReusability()
    {
        return $this->reusability;
    }

    public function addProfile($profile)
    {
        try {
            Profile::assertExists($profile);
            if (!in_array($profile, $this->profiles)) {
                $this->profiles[] = $profile;
            }
        } catch (\Exception $e) {
            throw new EuropeanaException('Failed to prepare payload', null, $e);
        }
    }

    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'search.json';
    }
}
