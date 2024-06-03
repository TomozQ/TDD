<?php

use \PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__) ."/../dollar.php");

class MoneyTest extends TestCase
{
  public function testMultiPlication()
  {
    $five = new Dollar(5);
    $product = $five->times(2);
    $this->assertEquals(10, $product->amount);
    $product = $five->times(3);
    $this->assertEquals(15, $product->amount);
  }

  public function testEquality()
  {
    $five = new Dollar(5);
    $this->assertTrue($five->equals(new Dollar(5)));
    $this->assertFalse($five->equals(new Dollar(6)));
  }
}