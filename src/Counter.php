<?php

use Prophecy\Exception\InvalidArgumentException;

class Counter
{
    private $current = 0;

    private $increment = 1;

    public function next()
    {
        $this->current += $this->increment;

        return $this->current;
    }

    public function setIncrement($increment)
    {
        if (!is_integer($increment)) {
            throw new InvalidArgumentException();
        }

        $this->increment = $increment;
    }
}
