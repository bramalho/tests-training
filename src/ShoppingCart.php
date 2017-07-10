<?php

class ShoppingCart
{
    private $items = [];

    private $loggers = [];

    public function addItem(ShoppingCartItem $item) : void
    {
        $this->items[] = $item;

        foreach ($this->loggers as $logger) {
            $logger->log('An item was added to the shopping cart');
        }
    }

    public function attachLogger(Logger $logger) : void
    {
        $this->loggers[] = $logger;
    }

    public function items() : array
    {
        return $this->items;
    }

    public function total() : int
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->price();
        }

        return $total;
    }
}
