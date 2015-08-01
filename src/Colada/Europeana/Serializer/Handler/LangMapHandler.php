<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Serializer\Handler;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonDeSerializationVisitor;
use JMS\Serializer\Context;
use Colada\Europeana\Model\EDM\LangMap;

class LangMapHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'Colada\Europeana\Model\EDM\LangMap',
                'method' => 'serializeDateTimeToJson',
            ),
        );
    }

    public function serializeDateTimeToJson(JsonDeSerializationVisitor $visitor, array $map, array $type, Context $context)
    {
        $langMap = new LangMap();
        $langMap->set($map);
        return $langMap;
    }
}
