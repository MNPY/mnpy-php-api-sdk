<?php

namespace MNPY\SDK\Client;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Client
 * @package MNPY\SDK\Client
 */
class Client
{
    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * @var array
     */
    protected $apiMethods = ["get", "post"];

    /**
     * @var string
     */
    protected $apiEndPoint = "https://api.mnpy.test";

    /**
     * @var string
     */
    protected $apiVersion = "v1";

    /**
     * @var array
     */
    protected $apiAuthentication;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->client = new GuzzleClient([
            'base_uri' => sprintf('%s/%s/', $this->apiEndPoint, $this->apiVersion)
        ]);
    }

    /**
     * @return array
     */
    public function getApiAuthentication(): array
    {
        return $this->apiAuthentication;
    }

    /**
     * @param array $apiAuthentication
     */
    public function setApiAuthentication(array $apiAuthentication)
    {
        $this->apiAuthentication = $apiAuthentication;
    }

    /**
     * @param Request $request
     * @param int $timeout
     * @return \stdClass
     * @throws \Exception
     */
    public function send(
        Request $request,
        $timeout = 30
    ) {
        if (!in_array($request->getMethod(), $this->apiMethods)) {
            throw new \Exception("Unsupported method.");
        }

        $body = \GuzzleHttp\Psr7\stream_for(\GuzzleHttp\json_encode($request->getBody()));

        /** @var ResponseInterface $response */
        $response = $this->client->request(
            $request->getMethod(),
            $request->getPath(),
            [
                'json'    => $request->getBody(),
                'timeout' => $timeout,
                'headers' => $request->getHeaders(),
                'auth'    => $this->apiAuthentication,
                'verify' => false
            ]
        );

        if ($response->getStatusCode() !== 200 && $response->getStatusCode() !== 201) {
            throw new \Exception("Invalid status code.", $response->getStatusCode());
        }

        return json_decode($response->getBody());
    }
}