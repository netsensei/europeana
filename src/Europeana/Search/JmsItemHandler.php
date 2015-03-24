<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Search;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\VisitorInterface;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use Europeana\Search\Item;

class JmsItemHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'ItemsCollection',
                'method' => 'deserializeCollection',
            ),
        );
    }

    public function deserializeCollection(VisitorInterface $visitor, $data, array $type, Context $context)
    {
        var_dump($context->attributes->get("foobar")->get());

        return new ArrayCollection($visitor->visitArray($data, $type, $context));
    }
}
