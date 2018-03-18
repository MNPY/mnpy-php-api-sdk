<?php

namespace MNPY\SDK\Api;

/**
 * Class Transaction
 * @package MNPY\Sdk
 */
interface TransactionInterface
{
    /**
     * @param $id
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function get($id);

    /**
     * @param string $merchant_name
     * @param float  $price
     * @param string $address
     * @param string $redirect_url
     * @param array  $options
     *
     * @return mixed
     */
    public function create(string $merchant_name, float $price, string $address, string $redirect_url, array $options);
}