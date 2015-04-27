<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Tests\Payload;

use Doctrine\Common\Collections\ArrayCollection;
use Europeana\Payload\PayloadResponseInterface;

class SearchPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'items' => new ArrayCollection(),
            'facets' => new ArrayCollection(),
            'breadCrumbs' => new ArrayCollection(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($payloadResponse->getItems(), $responseData['items']);
        $this->assertEquals($payloadResponse->getFacets(), $responseData['facets']);
        $this->assertEquals($payloadResponse->getBreadCrumbs(), $responseData['breadCrumbs']);
    }

}
