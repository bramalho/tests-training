<?php

use PHPUnit\Framework\TestCase;

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

    public function testShouldIncrementTwo(): void
    {
        $this->counter->setIncrement(2);

        $expected = $this->counter->next();
        $actual = 2;

        $this->assertEquals($expected, $actual);
    }

    public function testShouldIncrementZero(): void
    {
        $this->counter->setIncrement(0);

        $expected = $this->counter->next();
        $actual = 0;

        $this->assertEquals($expected, $actual);

        $expected = $this->counter->next();
        $this->assertEquals($expected, $actual);
    }

    public function testShouldGetMinusOne(): void
    {
        $this->counter->setIncrement(-1);

        $expected = $this->counter->next();
        $actual = -1;

        $this->assertEquals($expected, $actual);
    }
}
