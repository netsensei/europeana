# Europeana API library


[![Latest Version](https://img.shields.io/github/release/netsensei/europeana.svg?style=flat-square)](https://github.com/netsensei/europeana/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/netsensei/europeana/master.svg?style=flat-square)](https://travis-ci.org/netsensei/europeana)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/netsensei/europeana.svg?style=flat-square)](https://scrutinizer-ci.com/g/netsensei/europeana/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/netsensei/europeana.svg?style=flat-square)](https://scrutinizer-ci.com/g/netsensei/europeaana)
[![Total Downloads](https://img.shields.io/packagist/dt/netsensei/europeana.svg?style=flat-square)](https://packagist.org/packages/netsensei/europeana)

## A PHP client library for the Europeana Portal

This PHP library provides a highly abstract client implementation of the [Europeana REST API](http://labs.europeana.eu/api/). It allows your PHP application to query and retrieve the Europeana datasets which are published via the main [Europeana Portal](http://www.europeana.eu/) in a highly abstracted, developer friendly fashion.

### What is Europeana?

Europeana is an internet portal that acts as an interface to books, paintings, films, museum objects and archival records that have been digitised throughout Europe. More then 2.000 institutions across Europe have contributed. These range from large names such as the Rijksmuseum, the British Library or the Louvre to regional archives and local museums.

## Install

Via Composer

``` bash
$ composer require netsensei/europeana
```

## Usage

### API Key

You will need an API key before you can connect to the API endpoint. You can register an account an obtain a key at the [Europeana Labs](http://labs.europeana.eu/api/registration/) website.

### Basic example

Perform a basic search query:

```
$apiKey = "myRegisteredKey";
$payload = new Colada\Europeana\Payload\SearchPayload();
$payload->addQuery("Mona Lisa");

try
{
    $apiKey = "YourApiKey";
    $client = new Guzzle\Client()
    $apiClient = new Colada\Europeana\Transport\ApiClient($apiKey, $client);

    $payloadResponse = $apiClient->send($payload);

    $items = $payloadResponse->getItems();
    foreach ($items as $item) {
        $item->getTitle();
        $item->getType();
    }

} catch (new Colada\Europeana\Exception\EuropeanaException $e) {
    // Process the exception
}
```

The Europeana CLI project is a complete client application which leverages this
library. Refer to this projects' for a concrete implementation.

## Features

- API calls are modelled as a Payload -> Transport -> Response class representation.
- The response is deserialized using the [JMS Serializer](http://jmsyst.com/libs/serializer) library into first class citizen PHP objects.
- Highly abstracted, loose coupled components for easy reuse in your own applications.

## Documentation

Currently these API calls are entirely of partially implemented:

| Action | API call | Status |
------------------------------
| Search | search.json | Incomplete |
| Record | record.json | Incomplete |
| Dataset | dataset/[datasetId].json | Complete |
| Provider | provider/[providerId].json | Complete | 
| Suggestions | suggestions.json | Complete |
| Dataset (by provider) | provider/[providerId]/datasets.json | Complete |

If you have any particular questions regarding the operation of the API, please
refer to the [Europeana API Google Group](https://groups.google.com/forum/#!forum/europeanaapi).

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related, please email matthias@colada.be instead of using the issue tracker.

## Credits

This package is heavily inspired upon the [Slack API library](https://github.com/cleentfaar/slack) by [Cas Leentfaar](https://github.com/cleentfaar). Parts of the Slack API code where reused and adapted under the MIT License terms.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
