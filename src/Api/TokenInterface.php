<?php

namespace MNPY\SDK\Api;

/**
 * Class Token
 *
 * @package MNPY\SDK
 */
interface TokenInterface
{
    /**
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function all();

    /**
     * @param $symbol
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    public function get($symbol);
}