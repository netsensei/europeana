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
class WebResource extends AbstractModel
{
    private $about;

    private $webResourceDcRights;

    private $webResourceEdmRights;

    private $dcDescription;

    private $dcFormat;

    private $dcSource;

    private $dctermsExtent;

    private $dctermsIssued;

    private $dctermsConformsTo;

    private $dctermsCreated;

    private $dctermsIsFormatOf;

    private $dctermsHasPart;

    private $isNextInSequence;

    public function getAbout()
    {
        return $this->about;
    }

    public function getWebResourceDcRights()
    {
        return $this->webResourceDcRights;
    }

    public function getWebResourceEdmRights()
    {
        return $this->webResourceEdmRights;
    }

    public function getDcDescription()
    {
        return $this->dcDescription;
    }

    public function getDcFormat()
    {
        return $this->dcFormat;
    }

    public function getDcSource()
    {
        return $this->dcSource;
    }

    public function getDctermsExtent()
    {
        return $this->dctermsExtent;
    }

    public function getDctermsIssued()
    {
        return $this->dctermsIssued;
    }

    public function getDctermsConformsTo()
    {
        return $this->dctermsConformsTo;
    }

    public function getDctermsCreated()
    {
        return $this->dctermsCreated;
    }

    public function getDctermsIsFormatOf()
    {
        return $this->dctermsIsFormatOf;
    }

    public function getDctermsHasPart()
    {
        return $this->dctermsHasPart;
    }

    public function getIsNextInSequence()
    {
        return $this->isNextInSequence;
    }
}
