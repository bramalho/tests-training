<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers ShoppingCart
 */
class ShoppingCartTest extends TestCase
{
    /** @var  ShoppingCart */
    private $shoppingCart;

    protected function setUp() : void
    {
        $this->shoppingCart = new ShoppingCart();
    }

    protected function tearDown() : void
    {
        unset($this->shoppingCart);
    }

    public function testShoppingCartStartEmptyItems() : void
    {
        $this->assertEmpty($this->shoppingCart->items());
    }

    public function testShoppingCartStartWithEmptyTotal() : void
    {
        $this->assertEquals(0, $this->shoppingCart->total());
    }

    public function testAddItemToShoppingCart() : void
    {
        $item = $this->getShoppingCartItemProphecyWithPrice(1);

        $this->shoppingCart->attachLogger($this->getShoppingCartLogger('An item was added to the shopping cart'));
        $this->shoppingCart->addItem($item);

        //$this->assertCount(1, $this->shoppingCart->items());
        $this->assertEquals([$item], $this->shoppingCart->items());
    }

    public function testShoppingCartTotalAfterAddingItem() : void
    {
        $this->shoppingCart->attachLogger($this->getShoppingCartLogger('An item was added to the shopping cart'));
        $this->shoppingCart->addItem($this->getShoppingCartItemProphecyWithPrice(10));

        $this->assertEquals(10, $this->shoppingCart->total());
    }

    private function getShoppingCartLogger(string $message) : Logger
    {
        $log = $this->prophesize(Logger::class);
        $log->log($message)->shouldBeCalled();

        /** @var Logger $revelation */
        $revelation = $log->reveal();

        return $revelation;
    }

    private function getShoppingCartItemProphecyWithPrice(int $price) : ShoppingCartItem
    {
        $item = $this->prophesize(ShoppingCartItem::class);
        $item->price()->willReturn($price);

        /** @var ShoppingCartItem $revelation */
        $revelation = $item->reveal();

        return $revelation;
    }
}
