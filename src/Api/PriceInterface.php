<?php

namespace MNPY\SDK\Api;

/**
 * Class Price
 * @package MNPY\SDK
 */
interface PriceInterface
{
    /**
     * @param $pair
     * @param $value
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function convert($pair, $value);
}