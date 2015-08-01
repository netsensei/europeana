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
use Colada\Europeana\Enum\Language;
use Colada\Europeana\Exception\EuropeanaException;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class LangMap extends AbstractModel
{
    private $map;

    public function get($lang)
    {
        return $this->map->get($lang);
    }

    public function all()
    {
        return $this->map->toArray();
    }

    public function set(array $map)
    {
        $this->map = new ArrayCollection($map);
    }
}
