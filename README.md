# Europeana API library


[![Latest Version](https://img.shields.io/github/release/netsensei/europeana.svg?style=flat-square)](https://github.com/netsensei/europeana/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/netsensei/europeana/master.svg?style=flat-square)](https://travis-ci.org/netsensei/europeana)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/netsensei/europeana.svg?style=flat-square)](https://scrutinizer-ci.com/g/netsensei/europeana/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/netsensei/europeana.svg?style=flat-square)](https://scrutinizer-ci.com/g/netsensei/europeaana)
[![Total Downloads](https://img.shields.io/packagist/dt/netsensei/europeana.svg?style=flat-square)](https://packagist.org/packages/netsensei/europeana)

## A PHP client library for the Europeana Portal

This PHP library provides an  abstract client implementation of the [Europeana REST API](http://labs.europeana.eu/api/). It allows your PHP client to query and retrieve the Europeana datasets which are published via the main [Europeana Portal](http://www.europeana.eu/)

## Install

Via Composer

``` bash
$ composer require netsensei/europeana
```

## Usage

Perform a basic query:

```
$payload = new Colada\Europeana\Payload\SearchPayload();
$payload->addQuery("Mona Lisa");

try
{
    $apiKey = "ApiKey";
    $client = new Guzzle\Client() // ie. Guzzle client
    $apiClient = new Colada\Europeana\Transport\ApiClient($apiKey, $client);

    $payloadResponse = $apiClient->send($payload);

    $items = $payloadResponse->getItems();
    foreach ($items as $item) {
        $item->getTitle();
        $item->getType();
    }

} catch (new Colada\Europeana\Exception\EuropeanaException $e) {
    // Process
}
```

## Documentation

TBD

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


