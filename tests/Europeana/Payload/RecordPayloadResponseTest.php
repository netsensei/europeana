<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Colada\Europeana\Tests\Payload;

use Colada\Europeana\Payload\PayloadResponseInterface;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
class RecordPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
        	'object'               => [$this->createObject],
            'similarItems'         => [$this->createSimilarItem()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
    	// @todo
    	//  Add assertions
    }
}