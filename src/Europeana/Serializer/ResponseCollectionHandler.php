<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Serializer;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\VisitorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class ResponseCollectionHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'ResponseCollection',
                'method' => 'deserializeCollection',
            ),
        );
    }

    public function deserializeCollection(VisitorInterface $visitor, $data, array $type, Context $context)
    {
        return new ArrayCollection($visitor->visitArray($data, $type, $context));
    }
}
