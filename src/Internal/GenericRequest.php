<?php

namespace Otaku\ApiClient\Internal;

use Otaku\ApiClient\Internal\Collection\ArrayCollection;

class GenericRequest implements RequestInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    private $payload;

    /**
     * @var ArrayCollection
     */
    private $headers;

    public function __construct(ClientInterface $client, string $endpoint, array $payload = [])
    {
        $this->client = $client;
        $this->endpoint = $endpoint;
        $this->payload = $payload;

        $this->headers = new ArrayCollection();
    }

    public static function fromUri(ClientInterface $client, string $uri): RequestInterface
    {
        return new GenericRequest($client, $uri);
    }

    /**
     * @return ArrayCollection
     */
    public function getHeaders(): ArrayCollection
    {
        return $this->headers;
    }
}