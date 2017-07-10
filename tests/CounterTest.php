<?php

use PHPUnit\Framework\TestCase;
use BrunoTests\Counter;

class CounterTest extends TestCase
{
    /** @var  Counter */
    private $counter;

    protected function setUp(): void
    {
        $this->counter = new Counter();
    }

    public function testShouldStartAtOne(): void
    {
        $expected = $this->counter->next();
        $actual = 1;

        $this->assertEquals($expected, $actual);
    }

    public function testShouldGetTwo(): void
    {
        $this->counter->next();

        $expected = $this->counter->next();
        $actual = 2;

        $this->assertEquals($expected, $actual);
    }
}
