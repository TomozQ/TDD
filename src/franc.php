<?php

require_once(dirname(__FILE__) ."/money.php");

class Franc extends Money{
  
  public function __construct(int $amount)
  {
    $this->amount = $amount;
  }

  public function times(int $multiplier): Money
  {
    return new Franc($this->amount * $multiplier);
  }
}