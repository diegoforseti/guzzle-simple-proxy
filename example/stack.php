<?php

require_once __DIR__.'/../vendor/autoload.php';

use DSaouda\GuzzleSimpleProxy\Middleware;
use DSaouda\GuzzleSimpleProxy\Proxy\Proxy;
use DSaouda\GuzzleSimpleProxy\Proxy\ProxyList;
use DSaouda\GuzzleSimpleProxy\Proxy\Type\Fixed;
use DSaouda\GuzzleSimpleProxy\Proxy\Type\Random;
use DSaouda\GuzzleSimpleProxy\Proxy\Type\Rotate;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;

$proxyList = new ProxyList();
$proxyList->add(new Proxy('socks4://95.67.46.86:33325'));
$proxyList->add(new Proxy('socks5://97.74.230.244:55825'));
$proxyList->add(new Proxy('socks4://176.111.81.106:1080'));

$manager = new Rotate($proxyList);
//$manager = new Random($proxyList);
//$manager = new Fixed($proxyList);

$middleware = Middleware::proxy($manager);

$stack = new HandlerStack();
$stack->setHandler(new CurlHandler());
$stack->push($middleware);

$client = new Client(['handler' => $stack]);

for ($i = 0; $i <= 10; $i++) {
    $response = $client->get('http://api.ipify.org');
    echo $response->getBody();
    echo "\n";
}
