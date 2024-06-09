<?php

class Money {
  protected int $amount;

  protected string $currency;

  public function times(int $multiplier): Money
  {
    return new Money($this->amount * $multiplier, $this->currency);
  }

  public function __construct(int $amount, string $currency) 
  {
    $this->amount = $amount;
    $this->currency = $currency;
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

  public static function cast($obj): self
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
   * @return Dollar
   */
  public static function dollar(int $amount): Money
  {
    return new Dollar($amount, "USD");
  }

  /**
   * Factory Method
   * @param int $amount
   * 
   * @return Franc
   */
  public static function franc(int $amount): Money
  {
    return new Franc($amount, "CHF");
  }
}