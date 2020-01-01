<?php

namespace Otaku\ApiClient;

class ClientBroker
{
    /**
     * @var array
     */
    private $configuration;

    /**
     * @var array
     */
    private $clients;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
        $this->clients = [];
    }

    public function get(string $api): ApiClient
    {
        if (!array_key_exists($api, $this->clients)) {
            $this->clients[$api] = $this->initializeApi($api);
        }

        return $this->clients[$api];
    }

    private function initializeApi(string $api): ApiClient
    {
        return new ApiClient($this->configuration[$api]);
    }
}