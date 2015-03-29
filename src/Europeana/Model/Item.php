<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Model;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Item
{

  private $id;

    private $completeness;

    private $europeanaCollectionName;

    private $index;

    private $edmDatasetName;

    private $previewNoDistribute;

    private $title;

    private $dataProvider;

    private $rights;

    private $score;

    private $edmIsShownAt;

    private $europeanaCompleteness;

    private $edmPreview;

    private $timestamp;

    private $provider;

    private $language;

    private $type;

    private $optedOut;

    private $link;

    private $guid;

    public function getId()
    {
        return $this->id;
    }

    public function getCompleteness()
    {
        return $this->completeness;
    }

    public function getEuropeanaCollectionName()
    {
        return $this->europeanaCompleteness;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getEdmDatasetName()
    {
        return $this->edmDatasetName;
    }

    public function getPreviewNoDistribute()
    {
        return $this->previewNoDistribute;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    public function getRights()
    {
        return $this->rights;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getEdmIsShownAt()
    {
        return $this->edmIsShownAt;
    }

    public function getEuropeanaCompleteness()
    {
        return $this->europeanaCompleteness;
    }

    public function getEdmPreview()
    {
        return $this->edmPreview;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function getLanguage()
    {
        return $this->provider;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getOptedOut()
    {
        return $this->optedOut;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getGuid()
    {
        return $this->guid;
    }
}
