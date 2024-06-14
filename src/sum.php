<?php

require_once(dirname(__FILE__) ."/money.php");
require_once(dirname(__FILE__) ."/Expression.php");
require_once(dirname(__FILE__) ."/bank.php");

class Sum implements Expression{
  public Money $augend;
  public Money $addend;

  public function __construct(Money $augend, Money $addend) 
  {
    $this->augend = $augend;
    $this->addend = $addend;
  }

  public function reduce(Bank $bank, string $to): Money
  {
    $amount = $this->augend->amount() + $this->addend->amount();
    return new Money($amount, $to);
  }
}