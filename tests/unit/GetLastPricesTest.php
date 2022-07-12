<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient\tests\unit;

use rocketfellows\TinkoffInvestV1MarketDataRestClient\GetLastPricesInterface;

class GetLastPricesTest extends MarketDataServiceTest
{
    private const PARAMS = ['foo'];

    protected function prepareServiceMethodCallAssertions(array $expectedResponse): array
    {
        $this->assertClientRequestWithParams('GetLastPrices', self::PARAMS, $expectedResponse);

        return $this->marketDataService->getLastPrices(self::PARAMS);
    }

    protected function getExpectedInterfacesImplementations(): array
    {
        return [
            GetLastPricesInterface::class,
        ];
    }
}
