<?php

require_once(dirname(__FILE__) ."/money.php");

class Dollar extends Money{

  private $currency;

  public function __construct(int $amount)
  {
    $this->amount = $amount;
    $this->currency = "USD";
  }

  public function times(int $multiplier): Money
  {
    return new Dollar($this->amount * $multiplier);
  }

  public function currency(): string
  {
    return $this->currency;
  }
}