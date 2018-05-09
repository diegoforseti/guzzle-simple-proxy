<?php

namespace DSaouda\GuzzleSimpleProxy;

use DSaouda\GuzzleSimpleProxy\Proxy\AbstractManager;
use GuzzleHttp\Client as Guzzle;

final class Client extends Guzzle
{
    private $proxyManager;

    public function __construct(AbstractManager $proxyManager, array $config = [])
    {
        $this->proxyManager = $proxyManager;
        parent::__construct($config);
    }

    public function __call($method, $args)
    {
        $opts = isset($args[1]) ? $args[1] : [];
        $opts = $this->configureProxy($opts);
        $args[1] = $opts;

        return parent::__call($method, $args);
    }

    private function configureProxy(array $opts)
    {
        $proxy = $this->proxyManager->getProxy();
        $opts['proxy'] = $proxy;
        return $opts;
    }
}