<?php

namespace DSaouda\GuzzleSimpleProxy\Proxy\Type;

use DSaouda\GuzzleSimpleProxy\Proxy\AbstractManager;

final class Fixed extends AbstractManager
{
    public function getProxy()
    {
        $all = $this->proxyList->getAll();
        return array_shift($all);
    }
}