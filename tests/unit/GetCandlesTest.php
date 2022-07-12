<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient\tests\unit;

use rocketfellows\TinkoffInvestV1MarketDataRestClient\GetCandlesInterface;

class GetCandlesTest extends MarketDataServiceTest
{
    private const PARAMS = ['foo'];

    protected function prepareServiceMethodCallAssertions(array $expectedResponse): array
    {
        $this->assertClientRequestWithParams('GetCandles', self::PARAMS, $expectedResponse);

        return $this->marketDataService->getCandles(self::PARAMS);
    }

    protected function getExpectedInterfacesImplementations(): array
    {
        return [
            GetCandlesInterface::class,
        ];
    }
}
