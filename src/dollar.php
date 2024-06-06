<?php

require_once(dirname(__FILE__) ."/money.php");

class Dollar extends Money{

  public function __construct(int $amount)
  {
    $this->amount = $amount;
  }

  public function times(int $multiplier)
  {
    return new Dollar($this->amount * $multiplier);
  }
}