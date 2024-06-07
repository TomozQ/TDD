<?php

class Money {
  protected int $amount;

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
}