<?php

namespace Otaku\ApiClient\Internal\Collection;

interface CollectionInterface
{
    public function hasKey(string $key): bool;

    public function hasElement($element): bool;

    public function set(string $key, $value): void;

    public function get(string $key);
}