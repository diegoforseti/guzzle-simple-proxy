<?php

namespace DSaouda\GuzzleSimpleProxy\Proxy;

final class ProxyList
{
    private $proxyList = [];

    public function add(Proxy $proxy)
    {
        $value = $proxy->getValue();

        //não duplica
        $this->proxyList[$value] = $value;
    }

    public function getAll()
    {
        return $this->proxyList;
    }
}
