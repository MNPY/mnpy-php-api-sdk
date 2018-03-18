<?php

namespace MNPY\SDK;

use MNPY\SDK\Api\TokenInterface;
use MNPY\SDK\Client\Request;

/**
 * Class Token
 * @package MNPY\SDK
 */
class Token extends Base implements TokenInterface
{
    /**
     * Token constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function all()
    {
        $request = new Request("get", "tokens");

        $response = $this->client->send($request);

        return $response;
    }

    /**
     * @param $symbol
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function get($symbol)
    {
        $request = new Request("get", sprintf('token/%s', $symbol));

        $response = $this->client->send($request);

        return $response;
    }
}