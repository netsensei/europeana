<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Serializer;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Handler\HandlerRegistry;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSerializer
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    final public function __construct()
    {
        $metaDir = __DIR__ . '/../Resources/config/serializer';
        $builder = SerializerBuilder::create();
        $builder->addMetadataDir($metaDir);
        $builder
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()));

        $this->serializer = $builder->build();
    }
}
