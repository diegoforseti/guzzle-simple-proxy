<?php

namespace DSaouda\GuzzleSimpleProxy\Proxy\Type;

use DSaouda\GuzzleSimpleProxy\Proxy\AbstractManager;

final class Random extends AbstractManager
{
    public function getProxy()
    {
        $all = $this->proxyList->getAll();
        $values = array_values($all);

        $total = count($all) - 1;
        $chosen = rand(0, $total);

        return $values[$chosen];
    }
}
