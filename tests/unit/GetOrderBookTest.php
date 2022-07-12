<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient\tests\unit;

use rocketfellows\TinkoffInvestV1MarketDataRestClient\GetOrderBookInterface;

class GetOrderBookTest extends MarketDataServiceTest
{
    private const PARAMS = ['foo'];

    protected function prepareServiceMethodCallAssertions(array $expectedResponse): array
    {
        $this->assertClientRequestWithParams('GetOrderBook', self::PARAMS, $expectedResponse);

        return $this->marketDataService->getOrderBook(self::PARAMS);
    }

    protected function getExpectedInterfacesImplementations(): array
    {
        return [
            GetOrderBookInterface::class,
        ];
    }
}
