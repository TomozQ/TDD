<?php

class Money {
  protected int $amount;

  public function equals(object $object)
  {
    $money = $this::cast($object);
    return $this->amount === $money->amount;
  }

  public static function cast($obj): self
  {
    if (!$obj instanceof self) {
      throw new InvalidArgumentException("{$obj} is not instance of MoneyObject");
    }
    return $obj;
  }
}