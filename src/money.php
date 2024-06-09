<?php

abstract class Money {
  protected int $amount;

  protected string $currency;

  abstract public function times(int $multiplier): Money;

  public function currency() : string
  {
    return $this->currency;
  }

  public function equals(object $object)
  {
    $money = $this::cast($object);
    return $this->amount === $money->amount
      && get_class($this) === get_class($money);
  }

  public static function cast($obj): self
  {
    if (!$obj instanceof self) {
      throw new InvalidArgumentException("{$obj} is not instance of MoneyObject");
    }
    return $obj;
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