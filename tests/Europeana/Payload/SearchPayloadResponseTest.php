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

use Europeana\Payload\PayloadResponseInterface;

class SearchPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'items' => [$this->createItem()],
            'facets' => [],
            'breadCrumbs' => [],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertNotEmpty($payloadResponse->getItems());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $payloadResponse->getItems());
        $this->assertItem($responseData['items'][0], $payloadResponse->getItems()->get(0));

       /* $this->assertEquals($payloadResponse->getItems(), $responseData['items']);
        $this->assertEquals($payloadResponse->getFacets(), $responseData['facets']);
        $this->assertEquals($payloadResponse->getParams(), $responseData['params']);
        $this->assertEquals($payloadResponse->getBreadCrumbs(), $responseData['breadCrumbs']); */
    }
}
