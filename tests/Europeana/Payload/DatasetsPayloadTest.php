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

use Colada\Europeana\Payload\DatasetsPayload;
use Colada\Europeana\Payload\PayloadInterface;

class DatasetsPayloadTest extends AbstractPayloadTest
{
    public function testDatasets()
    {
        $payload = new DatasetsPayload();
        $payload->setProviderId('001');
        $method = $payload->getMethod();

        $this->assertEquals($method, 'provider/001/datasets.json');
    }

    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new DatasetsPayload();
        $payload->setProviderId('001');

        return $payload;
    }

    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        // Empty
    }
}
