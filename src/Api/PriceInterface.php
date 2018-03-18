<?php

namespace MNPY\SDK\Api;

/**
 * Class Price
 * @package MNPY\SDK
 */
interface PriceInterface
{
    /**
     * @param string $symbol
     *
     * @throws \Exception
     *
     * @return \stdClass
     */
    public function get(string $symbol);
}