<?php

require_once(dirname(__FILE__) ."/money.php");
require_once(dirname(__FILE__) ."/sum.php");
class Bank
{
  public function reduce(Expression $source, string $to): Money
  {
    return $source->reduce($to);
  }
}