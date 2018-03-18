<?php

namespace MNPY\SDK\Api;

/**
 * Class Helper
 *
 * @package MNPY\SDK
 */
interface HelperInterface
{
    /**
     * @param string $url
     * @param \stdClass $data
     * @param string $secret_key
     *
     * @return string
     */
    public function generateWebhookSignature(string $url, \stdClass $data, string $secret_key);
}