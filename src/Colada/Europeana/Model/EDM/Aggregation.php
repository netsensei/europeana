<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Model\EDM;

use Colada\Europeana\Model\AbstractModel;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Aggregation extends AbstractModel
{
    private $about;

    private $edmDataProvider;

    private $edmIsShownBy;

    private $edmIsShownAt;

    private $edmObject;

    private $edmProvider;

    private $edmRights;

    private $edmUgc;

    private $dcRights;

    private $hasView;

    private $aggregatedCHO;

    private $aggregates;

    private $edmUnstored;

    private $webResources;

    private function getAbout()
    {
        return $this->about;
    }

    private function getEdmDataProvider()
    {
        return $this->edmDataProvider;
    }

    private function getEdmIsShownBy()
    {
        return $this->edmIsShownBy;
    }

    private function getEdmIsShownAt()
    {
        return $this->edmIsShownAt;
    }

    private function getEdmObject()
    {
        return $this->edmObject;
    }

    private function getEdmProvider()
    {
        return $this->edmProvider;
    }

    private function getEdmRights()
    {
        return $this->edmRights;
    }

    private function getEdmUgc()
    {
        return $this->edmUgc;
    }

    private function getDcRights()
    {
        return $this->dcRights;
    }

    private function getHasView()
    {
        return $this->hasView;
    }

    private function getAggregatedCHO()
    {
        return $this->aggregatedCHO;
    }

    private function getAggregates()
    {
        return $this->aggregates;
    }

    private function getEdmUnstored()
    {
        return $this->edmUnstored;
    }

    private function getWebResources()
    {
        return $this->webResources;
    }
}
