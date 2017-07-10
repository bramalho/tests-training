<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Counter
 */
class CounterTest extends TestCase
{
    /** @var  Counter */
    private $counter;

    protected function setUp(): void
    {
        $this->counter = new Counter();
    }

    protected function tearDown()
    {
        unset($this->counter);
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

    public function nonIntegerProvider(): array
    {
        return [
            [1.1], ["1"], [null]
        ];
    }

    /**
     * @param $nonInteger
     * @dataProvider nonIntegerProvider
     */
    public function testShouldNotAcceptNonIntegers($nonInteger): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->counter->setIncrement($nonInteger);
    }
}
