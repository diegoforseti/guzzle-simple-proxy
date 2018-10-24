<?php

require_once __DIR__.'/../vendor/autoload.php';

use DSaouda\GuzzleSimpleProxy\Client;
use DSaouda\GuzzleSimpleProxy\Proxy\Proxy;
use DSaouda\GuzzleSimpleProxy\Proxy\ProxyList;
use DSaouda\GuzzleSimpleProxy\Proxy\Type\Fixed;
use DSaouda\GuzzleSimpleProxy\Proxy\Type\Random;
use DSaouda\GuzzleSimpleProxy\Proxy\Type\Rotate;

$proxyList = new ProxyList();
$proxyList->add(new Proxy('socks4://95.67.46.86:33325'));
$proxyList->add(new Proxy('socks5://97.74.230.244:55825'));
$proxyList->add(new Proxy('socks4://176.111.81.106:1080'));

$manager = new Rotate($proxyList);
//$manager = new Random($proxyList);
//$manager = new Fixed($proxyList);

$client = new Client($manager);

for ($i = 0; $i <= 10; $i++) {
    $response = $client->get('http://api.ipify.org');
    echo $response->getBody();
    echo "\n";
}
