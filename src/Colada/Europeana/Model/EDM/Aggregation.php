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

    private $webResources;

    public function getAbout()
    {
        return $this->about;
    }

    public function getEdmDataProvider()
    {
        return $this->edmDataProvider;
    }

    public function getEdmIsShownBy()
    {
        return $this->edmIsShownBy;
    }

    public function getEdmIsShownAt()
    {
        return $this->edmIsShownAt;
    }

    public function getEdmObject()
    {
        return $this->edmObject;
    }

    public function getEdmProvider()
    {
        return $this->edmProvider;
    }

    public function getEdmRights()
    {
        return $this->edmRights;
    }

    public function getEdmUgc()
    {
        return $this->edmUgc;
    }

    public function getDcRights()
    {
        return $this->dcRights;
    }

    public function getHasView()
    {
        return $this->hasView;
    }

    public function getAggregatedCHO()
    {
        return $this->aggregatedCHO;
    }

    public function getAggregates()
    {
        return $this->aggregates;
    }

    public function getWebResources()
    {
        return $this->webResources;
    }
}
