<?php

namespace DSaouda\GuzzleSimpleProxy\Proxy;

final class Proxy
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
