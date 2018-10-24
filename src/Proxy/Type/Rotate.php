<?php

namespace DSaouda\GuzzleSimpleProxy\Proxy\Type;

use DSaouda\GuzzleSimpleProxy\Proxy\AbstractManager;
use DSaouda\GuzzleSimpleProxy\Proxy\ProxyList;

final class Rotate extends AbstractManager
{
    /**
     * @var \SplQueue
     */
    private $queue;

    /**
     * Rotate constructor.
     *
     * @param ProxyList $proxyList
     */
    public function __construct(ProxyList $proxyList)
    {
        parent::__construct($proxyList);

        $this->queue = new \SplQueue();

        foreach ($proxyList->getAll() as $proxy) {
            $this->queue->enqueue($proxy);
        }

        $this->queue->setIteratorMode(\SplQueue::IT_MODE_FIFO);
    }

    /**
     * @return string
     */
    public function getProxy()
    {
        $proxy = $this->queue->dequeue();

        //retornando o proxy para o final da fila
        $this->queue->enqueue($proxy);

        return $proxy;
    }
}
