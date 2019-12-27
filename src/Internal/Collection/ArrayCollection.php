<?php

namespace Otaku\ApiClient\Internal\Collection;

class ArrayCollection implements CollectionInterface
{
    /**
     * @var array
     */
    protected $store = [];

    public function hasKey(string $key): bool
    {
        return array_key_exists($key, $this->store);
    }

    public function hasElement($element): bool
    {
        return in_array($element, $this->store, false);
    }

    public function set(string $key, $value): void
    {
        $this->store[$key] = $value;
    }

    public function get(string $key)
    {
        return $this->store[$key];
    }

    public function toArray(): array
    {
        return $this->store;
    }
}