<?php

namespace Otaku\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;

class ApiClient
{
    /**
     * @var array
     */
    private $configuration;

    /**
     * @var Client
     */
    private $client;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;

        $options = [
            'base_uri' => $configuration['base'],
        ];

        if (array_key_exists('auth', $configuration) && array_key_exists('basic', $configuration['auth'])) {
            $options['auth'] = [
                $configuration['auth']['basic']['username'],
                $configuration['auth']['basic']['password'],
            ];
        }

        $this->client = new Client($options);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    public function request($method, $endpoint, $options = [])
    {
        return $this->client->request($method, $endpoint, $options);
    }

    public function requestJson($method, $endpoint, $body = []): array
    {
        return json_decode($this->request($method, $endpoint, [
                RequestOptions::HEADERS => [
                    'Accept' => 'application/json'
                ],
                RequestOptions::BODY => json_encode($body, JSON_PRESERVE_ZERO_FRACTION)
            ]
        )->getBody()->getContents(), true);
    }
}