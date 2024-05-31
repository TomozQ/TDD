<?php

use \PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__) ."/../function.php");

class FunctionTest extends TestCase
{
  public function testHelloWorld()
  {
    $this->assertEquals(hello(),"hello");
  }
}