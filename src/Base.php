<?php

namespace MNPY\SDK;

use MNPY\SDK\Api\BaseInterface;
use MNPY\SDK\Client\Client;

/**
 * Class Base
 * @package MNPY\SDK
 */
class Base implements BaseInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Base constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->client = new Client();
        $this->setApiKey($apiKey);
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey)
    {
        $this->client->setApiAuthentication([$apiKey, $apiKey]);
    }
}