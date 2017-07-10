<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Counter
 */
class CounterTest extends TestCase
{
    /** @var  Counter */
    private $counter;

    protected function setUp() : void
    {
        $this->counter = new Counter();
    }

    protected function tearDown() : void
    {
        unset($this->counter);
    }

    public function testShouldStartAtOne() : void
    {
        $this->assertEquals(1, $this->counter->next());
    }

    public function testShouldGetTwo() : void
    {
        $this->counter->next();
        $this->assertEquals(2, $this->counter->next());
    }

    public function testShouldIncrementTwo() : void
    {
        $this->counter->setIncrement(2);
        $this->assertEquals(2, $this->counter->next());
    }

    public function testShouldIncrementZero() : void
    {
        $this->counter->setIncrement(0);
        $this->counter->next();
        $this->counter->next();
        $this->assertEquals(0, $this->counter->next());
    }

    public function testShouldGetMinusOne() : void
    {
        $this->counter->setIncrement(-1);
        $this->assertEquals(-1, $this->counter->next());
    }

    public function nonIntegerProvider() : array
    {
        return [
            'float'     => [1.1],
            'string'    => ["1"],
            'null'      => [null],
            'array'     => [[]]
        ];
    }

    /**
     * @param $nonInteger
     * @dataProvider nonIntegerProvider
     */
    public function testShouldNotAcceptNonIntegers($nonInteger) : void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->counter->setIncrement($nonInteger);
    }
}
