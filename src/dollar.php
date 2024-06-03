<?php

class Dollar{
  private int $amount;

  public function __construct(int $amount)
  {
    $this->amount = $amount;
  }

  public function times(int $multiplier)
  {
    return new Dollar($this->amount * $multiplier);
  }

  public function equals(object $object)
  {
    $dollar = $this::cast($object);
    return $this->amount === $dollar->amount;
  }

  public static function cast($obj): self
  {
    if (!$obj instanceof self) {
      throw new InvalidArgumentException("{$obj} is not instance of DollarObject");
    }
    return $obj;
  }
}