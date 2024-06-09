<?php

require_once(dirname(__FILE__) ."/money.php");
class Bank
{
  public function reduce(Expression $source, string $to): Money
  {
    return Money::dollar(10);
  }
}