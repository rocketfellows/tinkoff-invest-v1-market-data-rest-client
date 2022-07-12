<?php

namespace rocketfellows\TinkoffInvestV1MarketDataRestClient;

use rocketfellows\TinkoffInvestV1RestClient\exceptions\request\ClientException;
use rocketfellows\TinkoffInvestV1RestClient\exceptions\request\HttpClientException;
use rocketfellows\TinkoffInvestV1RestClient\exceptions\request\ServerException;

interface GetTradingStatusInterface
{
    /**
     * @throws ClientException
     * @throws HttpClientException
     * @throws ServerException
     */
    public function getTradingStatus(array $params): array;
}
