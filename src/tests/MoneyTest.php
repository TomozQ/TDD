<?php

use \PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__) ."/../dollar.php");
require_once(dirname(__FILE__) ."/../franc.php");

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
    $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
    $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    
    $this->assertTrue((new Franc(5))->equals(new Franc(5)));
    $this->assertFalse((new Franc(5))->equals(new Franc(6)));

    $this->assertFalse((new Franc(5))->equals(new Dollar(5)));
  }

  public function testFrancMultiPlication()
  {
    $five = new Franc(5);
    $this->assertEquals(new Franc(10), $five->times(2));
    $this->assertEquals(new Franc(15), $five->times(3));
  }
}
