<?php

namespace MNPY\SDK;

use MNPY\SDK\Api\HelperInterface;

/**
 * Class Helper
 * @package MNPY\SDK
 */
class Helper implements HelperInterface
{
    /**
     * @param string $url
     * @param \stdClass $data
     * @param string $secret_key
     *
     * @return string
     */
    public function generateWebhookSignature(
        string $url,
        \stdClass $data,
        string $secret_key
    ) {
        $signature = $url;
        $signature .= json_encode($data);

        return base64_encode(hash_hmac('sha1', $signature, $secret_key, true));
    }
}