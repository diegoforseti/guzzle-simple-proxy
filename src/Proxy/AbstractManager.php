<?php

namespace DSaouda\GuzzleSimpleProxy\Proxy;

abstract class AbstractManager
{
    protected $proxyList;

    public function __construct(ProxyList $proxyList)
    {
        $this->proxyList = $proxyList;
    }

    abstract public function getProxy();
}
