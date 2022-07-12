<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient\tests\unit;

use rocketfellows\TinkoffInvestV1MarketDataRestClient\GetTradingStatusInterface;

class GetTradingStatusTest extends MarketDataServiceTest
{
    private const PARAMS = ['foo'];

    protected function prepareServiceMethodCallAssertions(array $expectedResponse): array
    {
        $this->assertClientRequestWithParams('GetTradingStatus', self::PARAMS, $expectedResponse);

        return $this->marketDataService->getTradingStatus(self::PARAMS);
    }

    protected function getExpectedInterfacesImplementations(): array
    {
        return [
            GetTradingStatusInterface::class,
        ];
    }
}
