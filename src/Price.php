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
     * @param $pair
     * @param $value
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function convert($pair, $value)
    {
        $request = new Request("get", "price", [
            "pair"  => $pair,
            "value" => $value
        ]);

        $response = $this->client->send($request);

        return $response;
    }
}