<?php

use \PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

require_once(dirname(__FILE__) ."/../doller.php");

class MoneyTest extends TestCase
{
  public function testMultiPlication()
  {
    $five = new Doller(5);
    $five.times(2);
    assertEquals(10, $five->amount);
  }
}