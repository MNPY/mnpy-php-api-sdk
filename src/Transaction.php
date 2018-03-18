<?php

namespace MNPY\SDK;

use MNPY\SDK\Api\TransactionInterface;
use MNPY\SDK\Client\Request;

/**
 * Class Transaction
 * @package MNPY\Sdk
 */
class Transaction extends Base implements TransactionInterface
{
    /**
     * Transaction constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * @param $id
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function get($id)
    {
        $request = new Request("get", sprintf('transaction/%s', $id));

        $response = $this->client->send($request);

        return $response;
    }

    /**
     * @param string $merchant_name
     * @param float  $price
     * @param string $address
     * @param string $redirect_url
     * @param array  $options
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function create(
        string $merchant_name,
        float $price,
        string $address,
        string $redirect_url,
        array $options
    ) {
        $body = [
            "merchant_name" => $merchant_name,
            "price"         => $price,
            "address"       => $address,
            "redirect_url"  => $redirect_url
        ];

        foreach ($options as $option => $value) {
            if (!isset($body[$option])) {
                $body[$option] = $value;
            }
        }

        $request = new Request("post", "transaction", $body);

        $response = $this->client->send($request);

        return $response;
    }
}