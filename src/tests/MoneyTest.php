<?php

use \PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__) ."/../dollar.php");

class MoneyTest extends TestCase
{
  public function testMultiPlication()
  {
    $five = new Dollar(5);
    $this->assertEquals(new Dollar(10), $five->times(2));
    $this->assertEquals(new Dollar(15), $five->times(3));
  }

  public function testEquality()
  {
    $five = new Dollar(5);
    $this->assertTrue($five->equals(new Dollar(5)));
    $this->assertFalse($five->equals(new Dollar(6)));
  }
}