<?php

require_once(dirname(__FILE__) ."/money.php");

class Dollar extends Money{

  public function __construct(int $amount, string $currency)
  {
    parent::__construct($amount, $currency);
  }

  public function times(int $multiplier): Money
  {
    return Money::dollar($this->amount * $multiplier);
  }
}