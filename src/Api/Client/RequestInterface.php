<?php

namespace MNPY\SDK\Api\Client;

/**
 * Interface RequestInterface
 * @package MNPY\SDK\Api\Client
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @param string $method
     */
    public function setMethod(string $method);

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @param string $path
     */
    public function setPath(string $path);

    /**
     * @return array
     */
    public function getBody(): array;

    /**
     * @param array $body
     */
    public function setBody(array $body);

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers);
}