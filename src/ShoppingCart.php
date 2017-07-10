<?php

class ShoppingCart
{
    private $items = [];

    private $loggers = [];

    public function addItem(ShoppingCartItem $item)
    {
        $this->items[] = $item;

        foreach ($this->loggers as $logger) {
            $logger->log('An item was added to the shopping cart');
        }
    }

    public function attachLogger(Logger $logger)
    {
        $this->loggers[] = $logger;
    }

    public function items()
    {
        return $this->items;
    }

    public function total()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->price();
        }

        return $total;
    }
}