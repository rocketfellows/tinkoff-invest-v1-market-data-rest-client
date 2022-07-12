<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient\tests\unit;

use PHPUnit\Framework\MockObject\Builder\InvocationMocker;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use rocketfellows\TinkoffInvestV1MarketDataRestClient\MarketDataService;
use rocketfellows\TinkoffInvestV1RestClient\Client;

abstract class MarketDataServiceTest extends TestCase
{
    private const ACTUAL_SERVICE_NAME = 'MarketDataService';
    private const EXPECTED_RESPONSE = ['foo'];

    /**
     * @var MarketDataService
     */
    protected $marketDataService;

    /**
     * @var Client|MockObject
     */
    private $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->createMock(Client::class);

        $this->marketDataService = new MarketDataService($this->client);
    }

    public function testMethodRequest(): void
    {
        $this->assertImplementedInterfaces($this->marketDataService, $this->getExpectedInterfacesImplementations());

        $actualResponse = $this->prepareServiceMethodCallAssertions(self::EXPECTED_RESPONSE);

        $this->assertEquals(self::EXPECTED_RESPONSE, $actualResponse);
    }

    abstract protected function prepareServiceMethodCallAssertions(array $expectedResponse): array;
    abstract protected function getExpectedInterfacesImplementations(): array;

    protected function assertClientRequestWithParams(string $serviceMethod, array $params, ?array $response = []): void
    {
        $this->assertClientRequest($response)->with(self::ACTUAL_SERVICE_NAME, $serviceMethod, $params);
    }

    protected function assertClientRequestWithoutParams(string $serviceMethod, ?array $response = []): void
    {
        $this->assertClientRequest($response)->with(self::ACTUAL_SERVICE_NAME, $serviceMethod);
    }

    private function assertClientRequest(?array $response = []): InvocationMocker
    {
        return $this->client
            ->expects($this->once())
            ->method('request')
            ->willReturn($response);
    }

    protected function assertImplementedInterfaces(object $instance, array $expectedInterfaces): void
    {
        $actualInterfaceImplementations = class_implements(get_class($instance));

        foreach ($expectedInterfaces as $implementedInterface) {
            $this->assertArrayHasKey(
                $implementedInterface,
                $actualInterfaceImplementations,
                sprintf('Implementation of %s not fount', $implementedInterface)
            );
        }
    }
}
