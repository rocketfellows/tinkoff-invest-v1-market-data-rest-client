# Tinkoff Invest V1 market data service rest client

![Code Coverage Badge](./badge.svg)

Simple implementation of tinkoff invest v1 market data service.
Provides methods:
- GetLastPrices - https://tinkoff.github.io/investAPI/swagger-ui/#/MarketDataService/MarketDataService_GetLastPrices
- GetTradingStatus - https://tinkoff.github.io/investAPI/swagger-ui/#/MarketDataService/MarketDataService_GetTradingStatus
- GetOrderBook - https://tinkoff.github.io/investAPI/swagger-ui/#/MarketDataService/MarketDataService_GetOrderBook
- GetLastTrades - https://tinkoff.github.io/investAPI/swagger-ui/#/MarketDataService/MarketDataService_GetLastTrades
- GetCandles - https://tinkoff.github.io/investAPI/swagger-ui/#/MarketDataService/MarketDataService_GetCandles

Methods interfaces:
- \rocketfellows\TinkoffInvestV1MarketDataRestClient\GetTradingStatusInterface
- \rocketfellows\TinkoffInvestV1MarketDataRestClient\GetOrderBookInterface
- \rocketfellows\TinkoffInvestV1MarketDataRestClient\GetLastTradesInterface
- \rocketfellows\TinkoffInvestV1MarketDataRestClient\GetLastPricesInterface
- \rocketfellows\TinkoffInvestV1MarketDataRestClient\GetCandlesInterface

Methods interfaces implementation aggregated in \rocketfellows\TinkoffInvestV1MarketDataRestClient\MarketDataService.

For the sake of the interface segregation principle you should inject a specific interface as dependencies, and define the implementation through the container (DI).

## Installation
```shell
composer require rocketfellows/tinkoff-invest-v1-market-data-rest-client
```

## Methods contract definition

Component methods take an array as parameters, and raw arrays also serve as output values.

Methods throw the following types of exceptions:
- rocketfellows\TinkoffInvestV1RestClient\exceptions\request\ClientException
- rocketfellows\TinkoffInvestV1RestClient\exceptions\request\ServerException
- rocketfellows\TinkoffInvestV1RestClient\exceptions\request\HttpClientException

## Component dependencies

"rocketfellows/tinkoff-invest-v1-rest-client": "1.0.2" - as a common http client.

## Usage examples

Common http client configuration:

```php
$client = new Client(
    (
        new ClientConfig(
            'https://invest-public-api.tinkoff.ru/rest',
            <your_access_token>
        )
    ),
    new \GuzzleHttp\Client()
);
```

Market data service configuration (or interface specific method configuration via DI):

```php
$marketDataService = new MarketDataService($client);
```

Get instruments last prices method call example:

```php
$marketDataService->getLastPrices([
    'figi' => ['BBG004730RP0', 'BBG00TW9WTR3'],
]);
```

Result scheme you can find here: https://tinkoff.github.io/investAPI/swagger-ui/#/MarketDataService/MarketDataService_GetLastPrices

## Contributing

Welcome to pull requests. If there is a major changes, first please open an issue for discussion.

Please make sure to update tests as appropriate.
