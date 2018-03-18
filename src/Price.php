<?php

namespace MNPY\SDK;

use MNPY\SDK\Api\PriceInterface;
use MNPY\SDK\Client\Request;

/**
 * Class Price
 * @package MNPY\SDK
 */
class Price extends Base implements PriceInterface
{
    /**
     * Price constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * @param string $symbol
     *
     * @return \stdClass
     * @throws \Exception
     */
    public function get(string $symbol)
    {
        $request = new Request("get", sprintf("price/%s", $symbol));

        $response = $this->client->send($request);

        return $response;
    }
}