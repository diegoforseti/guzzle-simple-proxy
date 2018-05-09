<?php

namespace DSaouda\GuzzleSimpleProxy;

use DSaouda\GuzzleSimpleProxy\Proxy\AbstractManager;
use Psr\Http\Message\RequestInterface;

final class Middleware
{
    public static function proxy(AbstractManager $manager)
    {
        return function (callable $handler) use ($manager) {
            return function (RequestInterface $request,$options) use ($handler, $manager) {
                $options['proxy'] = $manager->getProxy();
                return $handler($request, $options);
            };
        };
    }

}