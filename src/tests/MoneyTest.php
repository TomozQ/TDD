<?php

use \PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__) ."/../dollar.php");

class MoneyTest extends TestCase
{
  public function testMultiPlication()
  {
    $five = new Dollar(5);
    $five->times(2);
    $this->assertEquals(10, $five->amount);
  }
}