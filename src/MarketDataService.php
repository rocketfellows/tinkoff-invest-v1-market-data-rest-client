<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient;

use rocketfellows\TinkoffInvestV1RestClient\Client;

class MarketDataService implements GetLastPricesInterface
{
    private const SERVICE_NAME = 'MarketDataService';

    private const SERVICE_METHOD_NAME_GET_LAST_PRICES = 'GetLastPrices';

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getLastPrices(array $params): array
    {
        return $this->requestMethod(self::SERVICE_METHOD_NAME_GET_LAST_PRICES, $params);
    }

    private function requestMethod(string $methodName, ?array $params = null): array
    {
        return $this->client->request(
            self::SERVICE_NAME,
            $methodName,
            $params
        );
    }
}
