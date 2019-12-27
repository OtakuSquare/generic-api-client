<?php

namespace Otaku\ApiClient\Internal;

interface RequestInterface
{
    public static function fromUri(ClientInterface $client, string $uri): RequestInterface;
}