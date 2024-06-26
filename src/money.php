<?php

require_once(dirname(__FILE__) ."/Expression.php");
require_once(dirname(__FILE__) ."/sum.php");
require_once(dirname(__FILE__) ."/bank.php");

class Money implements Expression{
  protected int $amount;

  protected string $currency;
  
  public function __construct(int $amount, string $currency) 
  {
    $this->amount = $amount;
    $this->currency = $currency;
  }

  public function times(int $multiplier): Money
  {
    return new Money($this->amount * $multiplier, $this->currency);
  }

  public function plus(Expression $addend): Expression
  {
    return new Sum($this, $addend);
  }

  public function reduce(Bank $bank, string $to): Money
  {
    $rate = $bank->rate($this->currency, $to);
    return new Money($this->amount / $rate, $to);
  }

  public function currency() : string
  {
    return $this->currency;
  }

  public function equals(object $object)
  {
    $money = $this::cast($object);
    return $this->amount === $money->amount
      && $this->currency === $money->currency;
  }

  public function amount(): int
  {
    return $this->amount;
  }

  private static function cast($obj): self
  {
    if (!$obj instanceof self) {
      throw new InvalidArgumentException("{$obj} is not instance of MoneyObject");
    }
    return $obj;
  }

  public function toString(): string
  {
    return $this->amount . " " . $this->currency;
  }

  /**
   * Factory Method
   * @param int $amount
   * 
   * @return Money
   */
  public static function dollar(int $amount): Money
  {
    return new Money($amount, "USD");
  }

  /**
   * Factory Method
   * @param int $amount
   * 
   * @return Money
   */
  public static function franc(int $amount): Money
  {
    return new Money($amount, "CHF");
  }
}