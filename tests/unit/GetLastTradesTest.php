<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient\tests\unit;

use rocketfellows\TinkoffInvestV1MarketDataRestClient\GetLastTradesInterface;

class GetLastTradesTest extends MarketDataServiceTest
{
    private const PARAMS = ['foo'];

    protected function prepareServiceMethodCallAssertions(array $expectedResponse): array
    {
        $this->assertClientRequestWithParams('GetLastTrades', self::PARAMS, $expectedResponse);

        return $this->marketDataService->getLastTrades(self::PARAMS);
    }

    protected function getExpectedInterfacesImplementations(): array
    {
        return [
            GetLastTradesInterface::class,
        ];
    }
}
