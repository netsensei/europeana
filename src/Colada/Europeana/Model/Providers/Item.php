<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Model\Providers;

use Colada\Europeana\Model\AbstractModel;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class Item extends AbstractModel
{
    private $identifier;

    private $country;

    private $name;

    private $acronym;

    private $altname;

    private $scope;

    private $domain;

    private $geolevel;

    private $role;

    private $website;

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAcronym()
    {
        return $this->acronym;
    }

    public function getAltname()
    {
        return $this->altname;
    }

    public function getScope()
    {
        return $this->scope;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function getGeolevel()
    {
        return $this->geolevel;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getWebsite()
    {
        return $this->website;
    }
}
